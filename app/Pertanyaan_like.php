<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan_like extends Model
{
    protected $table = 'pertanyaan_like';

    protected $fillable = [
        'user_id', 'pertanyaan_id', 'judul', 'isi'
    ];
}
