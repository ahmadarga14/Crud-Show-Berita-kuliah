@extends('layouts/app')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
@include('layouts/alert')
<form class="card" method="POST" action="{{route('berita.store')}}" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-placeholder">Judul</label>
            <input type="text" name="judul" id="judul" maxlength="10" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-placeholder">Id</label>
            <input type="text" name="id" id="id" class="form-control">
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-placeholder">Konten</label>
            <input   type="text" name="konten" id="konten" class="form-control" value="{{old('konten')}}"> <br>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-placeholder">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{old('tanggal')}}">
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label form="input-placeholder">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    <footer class="card-footer text-right">
        <button class="btn btn-w-lg btn-primary" type="submit">Simpan</button>
        <a href="{{route('berita.index')}}" class="btn btn-w-lg btn-dark" trpe="reset">Kembali ke Daftar Berita</a>
    </footer>
</form>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
@endpush