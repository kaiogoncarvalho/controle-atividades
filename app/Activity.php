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
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'name'        => 'string',
        'user_id'     => 'integer',
        'description' => 'string',
        'start_date'  => 'date',
        'end_date'    => 'date',
        'status_id'   => 'integer',
        'situation'   => 'boolean',
    ];

    public function setEndDateAttribute($value)
    {
        if(!empty($value)) {
            $date = \DateTime::createFromFormat('d/m/Y', $value);
            $this->attributes['end_date'] = $date->format('Y-m-d');
        }
    }

    public function setStartDateAttribute($value)
    {
        if(!empty($value)) {
            $date = \DateTime::createFromFormat('d/m/Y', $value);
            $this->attributes['start_date'] = $date->format('Y-m-d');
        }
    }

    public function getStartDateAttribute($value)
    {
        if(isset($value)) {
            $date = \DateTime::createFromFormat('Y-m-d' , $value);
            return $date->format('d/m/Y');
        }
        else{
            return '';
        }
    }

    public function getEndDateAttribute($value)
    {
        if(!empty($value)) {
            $date = \DateTime::createFromFormat('Y-m-d', $value);
            return $date->format('d/m/Y');
        }
        else{
            return '';
        }
    }





}
