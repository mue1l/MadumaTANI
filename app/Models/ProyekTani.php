<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekTani extends Model
{
    use HasFactory;
    protected $table = "proyek_tani";
    public $timestamps = false;

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
