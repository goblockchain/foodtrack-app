<?php

namespace App\Http\Controllers;

use App\DestinyTransport;
use App\Helpers;
use App\NotifyStatusProcess;
use App\OriginTransport;
use App\Process;
use App\ProfileProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportProcessController extends Controller
{
    public function create ($id) {
        $data['process'] = Process::find($id);

        return view('admin.product.process.formTransport')->with($data);
    }

    public function store (Request $request, $id) {
        $process = Process::find($id);
        $user = Auth::user();
        if($process) {
            if(count(Process::checkProcessPermission($user->id, $process->id))  > 0) {
                $data = $request->all();
                try {

                    $data['origin']['date'] = Helpers::convertDataBrToEua($data['origin']['date'], '-') . " " . date("H:i:s", strtotime($data['origin']['time']));
                    $data['origin']['user_id'] = $user->id;
                    $data['origin']['process_id'] = $process->id;

                    $data['destiny']['date'] = Helpers::convertDataBrToEua($data['destiny']['date'], '-') . " " . date("H:i:s", strtotime($data['destiny']['time']));
                    $data['destiny']['user_id'] = $user->id;
                    $data['destiny']['process_id'] = $process->id;

                    $origin = new OriginTransport($data['origin']);
                    $destiny = new DestinyTransport($data['destiny']);

                    if ($origin->save() && $destiny->save()) {
                        $countOrder = ProfileProcess::where(['process_id' => $process->id])->count();

                        if($countOrder == $process->step) {
                            $process->complete = true;
                        } else {
                            $process->step = $process->step + 1;
                        }
                        $process->save();

                        $notify = new NotifyStatusProcess();
                        $notify->message = 'Transporte efetuado';
                        $notify->process_id = $process->id;
                        $notify->save();
                        return redirect(route('admin.home'))->with('success', 'Transporte adicionado com sucesso');
                    } else {
                        return redirect(route('admin.product.process.transport.create', $id))->with('error', 'Erro ao adicionar transporte 1');
                    }

                } catch (\Exception $e) {
                    dd($e);
                    return redirect(route('admin.product.process.transport.create', $id))->with('error', 'Erro ao adicionar transporte 2');
                }
            } else {
                return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
            }
        } else {
            return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
        }

    }
}
