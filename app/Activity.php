<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{

    use SoftDeletes;

    protected $table = 'activities';

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'start_date',
        'end_date',
        'status_id',
        'situation'
    ];

    protected $dates = [
        'started_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'name'        => 'string',
        'user_id'     => 'integer',
        'description' => 'string',
        'start_date'  => 'date',
        'end_date'    => 'end_date',
        'status_id'   => 'integer',
        'situation'   => 'boolean',
    ];


}
