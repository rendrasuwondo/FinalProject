<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    protected $fillable = [
        'user_id', 'jawaban_id', 'judul', 'isi'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
