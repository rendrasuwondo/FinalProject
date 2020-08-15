<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    protected $fillable = [
        'user_id', 'pertanyaan_id', 'isi'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
