<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    
    protected $fillable = ['nama_foto', 'nama_file', 'deskripsi', 'id_pengguna'];

    public function user() {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

}
