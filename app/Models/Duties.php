<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duties extends Model
{
    // use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillables = [
        'id', 'rooms_number', 'notes', 'start_date', 'end_date', 'user_id', 'building_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
