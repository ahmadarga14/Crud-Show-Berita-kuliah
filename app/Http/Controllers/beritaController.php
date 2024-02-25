<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\berita;


class beritaController extends Controller
{
    private $folderFoto;
    
    
    public function __construct()
    {
        $this->folderFoto = public_path('upload/fotoberita/');
    }

    public function index()
    {
        $berita = berita::all();
        $title = "Data Keseluruhan Berita";
        return view('berita.index', compact('berita', 'title'));
    }

    public function create()
    {
        $title = "Input Data Berita";
        return view('berita.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'tanggal' => 'required',
        ]);

        $berita = new berita();
        $berita->id = $request->id;
        $berita->judul = $request->judul;
        $berita->konten= $request->konten;
        $berita->tanggal= $request->tanggal;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nowTimestamp = now()->timestamp;
            $fileName = "{$nowTimestamp}-{$file->getClientOriginalName()}";
            $file->move($this->folderFoto, $fileName);
            $berita->gambar = $fileName;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berhasil menambah data');
    }

    /* public function show(berita $berita)
    {
        $title = "Data Berita" . $berita->judul;
        return view('berita.show', compact('berita', 'title'));
    } */

    public function edit( $berita)
    {
        $title = "Form Ubah Data Berita";
        $berita = berita::findorfail($berita);
        // $berita = Berita::where('id', $berita)->first();

        // @dd($berita);
        return view('berita.edit', compact('berita', 'title'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'konten' => 'required',
        'tanggal' => 'required',
    ]);

    // $berita->judul = $request->judul;
    // $berita->konten = $request->konten;
    // $berita->tanggal = $request->tanggal;


    $berita = [
        'judul' => $request->judul,
        'konten' => $request->konten,
        'tanggal' => $request->tanggal,
    ];
    
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nowTimestamp = now()->timestamp;
        $fileName = "{$nowTimestamp}-{$file->getClientOriginalName()}";
        $file->move($this->folderFoto, $fileName);
        $berita['gambar'] = $fileName;
    }
    
    Berita::where('id', $id)->update($berita);
    

    return redirect()->route('berita.index')->with('success', 'Berhasil mengubah data');
}


    public function destroy(string $id)
    {
        berita::where('id', $id)->delete();
        return redirect()->to('berita')->with('success', 'Berhasil Menghapus Berita');
    }
}
