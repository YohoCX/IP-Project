<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class HomeController extends Controller
{
    //
    function index(){
        $data = Product::all();
        return view('home',['products'=>$data]);
    }
}
