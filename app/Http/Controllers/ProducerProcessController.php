<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Process;
use App\ProducerProcess;
use App\ProfileProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducerProcessController extends Controller
{
    public function store (Request $request, $productId) {
        $user = Auth::user();
        if($user->profile_type == 'producer') {
            $users = $request->only(['laboratory', 'transport', 'industry']);

            $countUserProcess = 0;
            foreach ($users as $u => $userProcess) {
                if($userProcess) $countUserProcess++;
            }

            if ($countUserProcess == 0) return redirect(route('admin.home'))->with('error', 'Erro ao inserir processo. Selecione pelo menos uma empresa');

            $process = new Process(['step' => 1, 'user_id' => $user->id, 'product_id' => $productId]);
            if($process->save()) {

                try {
                    $dataProducer = $request->only(['planting_s', 'planting_f', 'fertilizer_s', 'fertilizer_f', 'harvest_s', 'harvest_f', 'herbicide_s', 'herbicide_f']);

                    foreach ($dataProducer as $d => $data) {
                        $dataProducer[$d] = Helpers::convertDataBrToEua($data, '-');
                    }

                    $dataProducer['process_id'] = $process->id;
                    $dataProducer['user_id'] = $user->id;

                    $producerProcess = new ProducerProcess($dataProducer);
                    $producerProcess->save();

                    $step = 1;

                    foreach ($users as $u => $user) {
                        if ($user) {
                            $stepProcess = new ProfileProcess(['user_id' => $users[$u], 'status' => 0, 'order' => $step, 'process_id' => $process->id]);
                            $stepProcess->save();
                            $step++;
                        }
                    }

                    return redirect()->route('admin.product.process.show', ['idProduct' => $productId, 'id' => $process->id])->with('success', 'Processo inserido com sucesso');
                } catch (\Exception $e) {
                    return redirect(route('admin.home'))->with('error', 'Erro ao inserir processo');
                }
            } else {
                return redirect(route('admin.home'))->with('error', 'Erro ao inserir processo');
            }
        } else {
            return redirect(route('admin.home'))->with('error', 'Erro ao inserir processo');
        }
    }
}
