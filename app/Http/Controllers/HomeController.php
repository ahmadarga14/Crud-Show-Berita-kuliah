<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $title='homepage';
        return view('homepage',compact('title'));
    }
    public function profil()
    {
        $title='Profil kami';
        return view('profil',compact('title'));
    }
    public function kontak()
    {
        $title ='kontak';
        return view('kontak',compact('title'));
    }

}
