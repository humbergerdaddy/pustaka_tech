<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;


class buku extends Model
{
    

    protected $table='buku';
    protected $primaryKey='id';
    protected $fillable=['id', 'kategori_id', 'judul', 'penulis', 'penerbit', 'deskripsi', 'isbn', 'tahun', 'jumlah', 'book_img'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
