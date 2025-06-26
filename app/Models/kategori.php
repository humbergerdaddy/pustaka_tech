<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use softDeletes;

    protected $table='kategori';
    protected $primaryKey='id';
    protected $fillable=['id', 'nama'];
}
