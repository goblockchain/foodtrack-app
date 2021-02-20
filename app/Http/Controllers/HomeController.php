<?php

namespace App\Http\Controllers;

use App\Process;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $data['products'] = ProductModel::where(['user_id' => $user->id])->paginate(12);

        if ($user->profile_type != "producer") {
            $data['process'] = Process::getProcess($user->id);
        }

        return view('admin.home')->with($data);
    }
}
