<?php

namespace App\Http\Controllers;

use App\DestinyTransport;
use App\IndustryProcess;
use App\LaboratoryProcess;
use App\OriginTransport;
use App\Process;
use App\ProducerProcess;
use App\ProductModel;
use App\ProfileProcess;
use App\User;
use App\VisitProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function index () {
        $user = Auth::user();
        $data['process'] = Process::where(['user_id' => $user->id])->get();
        return view('admin.process.index')->with($data);
    }

    public function create ($idProduct) {
        $user = Auth::user();
        $product = ProductModel::where(['id' => $idProduct, 'user_id' => $user->id])->first();
        if($product) {
            $data['product'] = $product;
            $data['laboratory'] = User::where(['profile_type' => 'laboratory'])->get();
            $data['transport'] = User::where(['profile_type' => 'transport'])->get();
            $data['industry'] = User::where(['profile_type' => 'industry'])->get();

            return view('admin.product.process.create')->with($data);
        }
    }

    public function show ($productId, $id) {
        $process = Process::find($id);
        $user = Auth::user();
        $resp = [];

        if($process) {
            $producer = ProducerProcess::where(['process_id' => $process->id])->first();
            if ($producer) {
                $produtor = User::find($producer->user_id);
                $planting = ['date_s' => $producer->planting_s, 'date_f' => $producer->planting_f, 'company' => $produtor];
                $resp['planting'] = $planting;



                $fertilizer = ['date_s' => $producer->fertilizer_s, 'date_f' => $producer->fertilizer_f, 'company' => $produtor];

                $resp['fertilizer'] = $fertilizer;

                $harvest = ['date_s' => $producer->harvest_s, 'date_f' => $producer->harvest_f,'company' => $produtor];
                $resp['harvest'] = $harvest;


                $herbicide = ['date_s' => $producer->herbicide_s, 'date_f' => $producer->herbicide_f, 'company' => $produtor];

                $resp['herbicide'] = $herbicide;

            }

            $profileProcess = ProfileProcess::where(['process_id' => $process->id])->get();

            foreach ($profileProcess as $profile) {

                if ($profile->user->profile_type == 'laboratory') {
                    $processLab = LaboratoryProcess::where(['process_id' => $process->id])->first();
                    if($processLab) {
                        $lab['company'] = $profile->user;
                        $lab['name'] = $profile->user->name;
                        $lab['cnpj'] = $profile->user->cnpj_cpf;
                        $lab['test'] = $processLab->test;
                        $lab['date'] = $processLab->created_at;
                        $resp[$profile->user->profile_type] = $lab;
                    }
                }

                if ($profile->user->profile_type == 'transport') {
                    $trans['origin'] = OriginTransport::where(['process_id' => $process->id])->first();
                    $trans['destiny'] = DestinyTransport::where(['process_id' => $process->id])->first();
                    $trans['company'] = $profile->user;
                    if($trans['origin'] && $trans['destiny']) {
                        $resp[$profile->user->profile_type] = $trans;
                    }
                }

                if ($profile->user->profile_type == 'industry') {
                    $ind = IndustryProcess::where(['process_id' => $process->id])->first();
                    if($ind) {
                        $industry['company'] = $profile->user;
                        $industry['date_validity'] = $ind->date_validity;

                        $resp[$profile->user->profile_type] = $industry;
                    }
                }
            }
        }

        $data['stepsProcess'] = $resp;
        $data['process'] = $process;

        return view('admin.product.process.show')->with($data);
    }


    public function showSite ($id) {
        $process = Process::find($id);
        $resp = [];
        if($process) {

            $visit = new VisitProduct();
            $visit->product_id = $process->product_id;
            $visit->save();
            $producer = ProducerProcess::where(['process_id' => $process->id])->first();

            if ($producer) {
                $produtor = User::find($producer->user_id);
                $planting = ['date_s' => $producer->planting_s, 'date_f' => $producer->planting_f, 'company' => $produtor];
                $resp['planting'] = $planting;



                $fertilizer = ['date_s' => $producer->fertilizer_s, 'date_f' => $producer->fertilizer_f, 'company' => $produtor];

                $resp['fertilizer'] = $fertilizer;

                $harvest = ['date_s' => $producer->harvest_s, 'date_f' => $producer->harvest_f,'company' => $produtor];
                $resp['harvest'] = $harvest;


                $herbicide = ['date_s' => $producer->herbicide_s, 'date_f' => $producer->herbicide_f, 'company' => $produtor];

                $resp['herbicide'] = $herbicide;

            }


            $profileProcess = ProfileProcess::where(['process_id' => $process->id])->get();

            foreach ($profileProcess as $profile) {

                if ($profile->user->profile_type == 'laboratory') {
                    $processLab = LaboratoryProcess::where(['process_id' => $process->id])->first();
                    if($processLab) {
                        $lab['company'] = $profile->user;
                        $lab['name'] = $profile->user->name;
                        $lab['cnpj'] = $profile->user->cnpj_cpf;
                        $lab['test'] = $processLab->test;
                        $lab['date'] = $processLab->created_at;
                        $resp['laboratory'] = $lab;
                    }
                }

                if ($profile->user->profile_type == 'transport') {
                    $trans['company'] = $profile->user;
                    $trans['origin'] = OriginTransport::where(['process_id' => $process->id])->first();
                    $trans['destiny'] = DestinyTransport::where(['process_id' => $process->id])->first();
                    if($trans['origin'] && $trans['destiny']) {
                        $resp['transport'] = $trans;
                    }
                }

                if ($profile->user->profile_type == 'industry') {

                    $ind = IndustryProcess::where(['process_id' => $process->id])->first();
                    if($ind) {
                        $industry['date_validity'] = $ind->date_validity;
                        $industry['company'] = $profile->user;
                        $resp['industry'] = $industry;
                    }
                }
            }
        }
        $data['stepsProcess'] = $resp;
        $data['process'] = $process;
        return view('site.product.show')->with($data);
    }

    public function indexCompany (Request $request) {
        $data = $request->all();


        $data['companys'] = User::where(isset($data['profile_type']) ? ['profile_type' => $data['profile_type']] : [])->paginate(12);

        return view('admin.company.index')->with($data);
    }
}
