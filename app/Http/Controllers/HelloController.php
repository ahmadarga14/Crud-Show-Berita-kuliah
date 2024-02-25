<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index()
    {
        return view ("hello");
    }
    public function biodata()
    {$nim="211150045";
     $nama="Ahmad Aulia Dhaksina Arga";
     $alamat="Jl.Buaran Hankam ";
     return view ("hello",compact('nim','nama','alamat'));
    }
}
