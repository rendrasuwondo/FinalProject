<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban_like extends Model
{
    protected $table = 'jawaban_like';

    protected $fillable = [
        'user_id', 'jawaban_id', 'point'
    ];
}
