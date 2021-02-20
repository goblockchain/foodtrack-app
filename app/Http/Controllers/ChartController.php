<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\ProductModel;
use App\VisitProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function show () {
        $user = Auth::user();
        $data['products'] = ProductModel::where(['user_id' => $user->id])->get();
        return view('admin.chart.show')->with($data);
    }

    public function getVisits(Request $request) {
        $data = $request->all();
        $visits = VisitProduct::getVisits($data['product_id'], Helpers::convertDataBrToEua($data['date_start'], '-'), Helpers::convertDataBrToEua($data['date_end'], '-'));

        return $visits;
    }
}
