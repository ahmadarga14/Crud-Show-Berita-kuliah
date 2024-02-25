<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registercontroller extends Controller
{
    public function daftar()
    {
        return view("formdaftar");
    }
    public function simpan(request $request)
    {
        $data['nama']=$request->nama;
        $data['email']=$request->email;
        $data['alamat']=$request->alamat;
        $judul= 'Terimakasih Telah Mengisi Data Diri Anda';
        return view ("hasilform ", compact('data','judul'));

    }
}
