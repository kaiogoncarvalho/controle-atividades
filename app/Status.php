<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'name',
    ];

    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

}
