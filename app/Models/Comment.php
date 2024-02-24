<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi_komentar',
        'user_id',
        'image_id',
        'body',
    ];

    // Definisikan hubungan antara komentar dan pengguna (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan hubungan antara komentar dan gambar (image)
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
