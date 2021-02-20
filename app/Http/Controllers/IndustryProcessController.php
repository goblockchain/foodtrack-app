<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\IndustryProcess;
use App\NotifyStatusProcess;
use App\Process;
use App\ProfileProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndustryProcessController extends Controller
{
    public function create ($id) {
        $data['process'] = Process::find($id);
        return view('admin.product.process.formIndustry')->with($data);
    }

    public function store (Request $request, $id) {
        $data = $request->all();
        $user = Auth::user();
        $process = Process::find($id);
        if($process) {
            if(count(Process::checkProcessPermission($user->id, $process->id))  > 0) {
                $data['date_validity'] = Helpers::convertDataBrToEua($data['date_validity'], '-');
                $data['user_id'] = $user->id;
                $data['process_id'] = $process->id;
                $ind = new IndustryProcess($data);
                if($ind->save()) {

                    $countOrder = ProfileProcess::where(['process_id' => $process->id])->count();

                    if($countOrder == $process->step) {
                        $process->complete = true;
                    } else {
                        $process->step = $process->step + 1;
                    }
                    $process->save();

                    $notify = new NotifyStatusProcess();
                    $notify->message = 'Industrialização confirmada';
                    $notify->process_id = $process->id;
                    $notify->save();

                    return redirect(route('admin.home'))->with('success', 'Industrialização adicionada com sucesso');
                } else {
                    return redirect(route('admin.home'))->with('error', 'Erro ao adicionar industrialização');
                }
            } else {
                return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
            }
        } else {
            return redirect(route('admin.home'))->with('error', 'Processo não encontrado');
        }
    }
}
