@extends('layouts/app')
@section('title',$title)
@section('content')
<h5>{{$title}}</h5>
@include('layouts/alert')
<p><a href="{{route('berita.create')}}">Tambah Berita Baru</a>
<table class="table table-striped" id="tabeldata" width="100%">
    <thead> 
        <tr>         
            <th>No</th>
            <th>ID</th> 
            <th>Judul</th> 
            <th>Konten</th>
            <th>Tanggal</th> 
            <th>Gambar</th> 
            <th class="col-md-2">Action</th> 
        </tr>        
    </thead> 
    
    <tbody>
    @foreach($berita as $data)
        <tr>
            <td>{{$loop->iteration}}</td> <td>{{$data->id}}</td><td>{{$data->judul}}</td>
            <td>{{$data->konten}}</td> <td>{{$data->tanggal}}</td>
            <td><img src="upload/fotoberita/{{$data->gambar}}" class='img-thumbnail' width='100' height="100"></td>
            <td>
                <br><a class="btn btn-secondary d-inline mb-2" href="{{ route('berita.edit', $data['id'] )}}">Edit </a> 
                <form class="mt-2" method="POST" action="{{route('berita.destroy',$data->id)}}" onsubmit="return hapus();">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE"> 
                    <button type="submit" class="btn btn-danger d-inline">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody> </table>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
@endpush
@push('js')
<script>
function hapus(){
    if(confirm('Yakin ingin menghapus data ini?')){return true;}
    else{return false;}
}
</script>
@endpush