<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart(){
        return view('order.cart');
    }

    public function create(){
        return view('order.create');
    }

    public function index(){
        return view('order.index');
    }
}
