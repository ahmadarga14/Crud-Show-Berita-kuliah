<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    private $jenkel;
    private $folderFoto;

    public function __construct()
    {
        $this->jenkel = array('L' => 'Laki-laki', 'P' => 'Perempuan');
        $this->folderFoto = public_path('upload/fotomahasiswa/');
    }

    public function index()
    {
        $jenkel = $this->jenkel;
        $mahasiswa = Mahasiswa::all();
        $title = "Data Keseluruhan Berita";
        return view('mahasiswa.index', compact('mahasiswa', 'jenkel', 'title'));
    }

    public function create()
    {
        $title = "Input Data Berita";
        $jenkel = $this->jenkel;
        return view('mahasiswa.create', compact('jenkel', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenkel' => 'required'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nowTimestamp = now()->timestamp;
            $fileName = "{$nowTimestamp}-{$file->getClientOriginalName()}";
            $file->move($this->folderFoto, $fileName);
            $mahasiswa->foto = $fileName;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil menambah data');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $title = "Data Berita " . $mahasiswa->nim;
        $jenkel = $this->jenkel;
        return view('mahasiswa.show', compact('jenkel', 'mahasiswa', 'title'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        w
        $title = "Form Ubah Data Mahasiswa";
        return view('mahasiswa.edit', compact('jenkel', 'mahasiswa', 'title'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenkel' => 'required'
        ]);

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->jenkel = $request->jenkel;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nowTimestamp = now()->timestamp;
            $fileName = "{$nowTimestamp}-{$file->getClientOriginalName()}";
            $file->move($this->folderFoto, $fileName);
            $mahasiswa->foto = $fileName;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}