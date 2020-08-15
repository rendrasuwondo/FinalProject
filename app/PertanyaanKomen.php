<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PertanyaanKomen extends Model
{
    protected $table = 'pertanyaan_komen';

    protected $fillable = [
        'user_id', 'pertanyaan_id', 'isi'  
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
