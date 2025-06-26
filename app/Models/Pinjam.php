<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    //
    public function buku()
    {
        return $this->belongsTo(buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
