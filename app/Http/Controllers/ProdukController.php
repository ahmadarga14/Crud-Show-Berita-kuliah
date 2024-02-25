<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->produk=array(
            array('kode'=>'001','nama'=>'pensil','harga'=>'1000'),
            array('kode'=>'002','nama'=>'pulpen','harga'=>'2000'),
            array('kode'=>'003','nama'=>'penggaris','harga'=>'1500'),
            array('kode'=>'004','nama'=>'penghapus','harga'=>'500'),
            array('kode'=>'005','nama'=>'rautan','harga'=>'2000'),
            array('kode'=>'006','nama'=>'buku tulis','harga'=>'4000'),
            array('kode'=>'007','nama'=>'buku gambar','harga'=>'5000'),
        );
    }

    public function index()
    {
        $title ='Home';
        return view('produkwelcome',compact('title'));
    }

    public function produk()
    {
        $title='Data Produk';
        $produk=$this -> produk;
        return view('produk',compact('produk','title'));
    }

    public function detail($kode)
    {
        $key=array_search($kode,array_column($this->produk,'kode'));
        $detailproduk=$this->produk[$key];
        $title='detail produk';
        return view('detailproduk',compact('detailproduk','title'));

    }
    
}
