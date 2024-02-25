<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $table =  'berita';
    protected $primarykey = "id";    
    protected $fillable = ['id','judul', 'konten', 'tanggal', 'gambar', 'created_at', 'updated_at'];
    public $timestamps=true;
}
