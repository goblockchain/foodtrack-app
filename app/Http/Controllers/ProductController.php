<?php

namespace App\Http\Controllers;

use App\DonationProduct;
use App\Helpers;
use App\Process;
use App\ProductImages;
use App\ProductModel;
use App\VisitProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index () {
        $product = ProductModel::where(['user_id' => Auth::user()->id])->first();
        if($product) {
            $data['product'] = $product;
            return view('admin.product.index')->with($data);
        } else {
            return redirect()->back()->with('error', 'Produto não encontrado');
        }
    }

    public function show ($id) {
        $product = ProductModel::where(['id' => $id, 'user_id' => Auth::user()->id])->first();
        if($product) {
            $data['product'] = $product;
            $data['process'] = Process::where(['product_id' => $product->id])->get();
            return view('admin.product.show')->with($data);
        } else {
            return redirect()->back()->with('error', 'Produto não encontrado');
        }
    }

    public function create() {
        return view('admin.product.create');
    }

    public function store (Request $request) {
        if ($request->hasFile('imagens')) {
            $data = $request->all();

            $data['user_id'] = Auth::user()->id;
            $product = new ProductModel($data);
            $product->save();

            if (isset($data['donation']) && !empty(trim($data['donation']))) {
              $donation = new DonationProduct();
              $donation->type = $data['donation'];
              $donation->product_id = $product->id;
              $donation->save();
            }

            if ($request->hasFile('imagens')) {

                foreach ($request->imagens as $image) {
                    $name = uniqid(date('HisYmd')) . time() . $image->getClientOriginalName();
                    // Recupera a extensão do arquivo
                    $r = $image->move(public_path('/uploads/product-images'), $name);
                    if($r) {
                        $img = new ProductImages(['name' => $name, 'product_id' => $product->id]);
                        $img->save();
                    }
                }

            }
            return redirect()->route('admin.product.process.create', ['id' => $product->id])->with('success', 'Produto inserido com sucesso');

        } else {
            return redirect()->back()->with('error', 'Selecione uma imagem');
        }
    }



    public function showSite ($id) {
        $product = ProductModel::find($id);
        if($product) {
            return view('site.product.show')->with(['product' => $product]);
        } else {
            echo"Não encontrado";
        }
    }

    public function checkout ($id) {
        $product = ProductModel::find($id);
        if($product) {
            return view('site.product.checkout')->with(['product' => $product]);
        } else {
            echo"Não encontrado";
        }
    }
}
