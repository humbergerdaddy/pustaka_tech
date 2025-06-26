<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengembalian extends Model
{
    use softDeletes;

    protected $table='pengembalian';
    protected $primaryKey='id';
    protected $fillable = ['id', 'pinjam_id', 'tgl_kembali', 'denda'];

    public function pinjam():BelongsTo
    {
        return $this->belongsTo(pinjam::class);
    }
}
