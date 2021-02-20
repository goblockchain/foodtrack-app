<?php

namespace App\Http\Controllers;

use App\LaboratoryProcess;
use App\NotifyStatusProcess;
use App\Process;
use App\ProfileProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratoryProcessController extends Controller
{
    public function create ($id) {
        $data['process'] = Process::find($id);

        return view('admin.product.process.formLaboratory')->with($data);
    }

    public function store (Request $request, $id) {
        try {
            $data = $request->all();
            $user = Auth::user();

            $process = Process::find($id);
            if($process) {
                if(count(Process::checkProcessPermission($user->id, $process->id))  > 0) {
                    $lab = new LaboratoryProcess($data);
                    $lab->user_id = $user->id;
                    $lab->process_id = $process->id;

                    if ($lab->save()) {

                        $countOrder = ProfileProcess::where(['process_id' => $process->id])->count();

                        $notify = new NotifyStatusProcess();
                        $notify->message = 'Laboratório inseriu o teste';
                        $notify->process_id = $process->id;
                        $notify->save();

                        if($countOrder == $process->step) {
                            $process->complete = true;
                        } else {
                            $process->step = $process->step + 1;
                        }
                        $process->save();
                        return redirect(route('admin.home'))->with('success', 'Processo adicionado com sucesso');
                    } else {
                        return redirect(route('admin.home'))->with('error', 'Erro ao adicionar processo');
                    }
                } else {
                    return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
                }
            } else {
                return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
            }

        } catch (\Exception $e) {
            return redirect(route('admin.home'))->with('error', 'Erro ao inserir processo');
        }

    }
}
