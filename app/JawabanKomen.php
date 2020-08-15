<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanKomen extends Model
{
    protected $table = 'jawaban_komen';
    protected $fillable = [
        'user_id', 'jawaban_id', 'isi'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
