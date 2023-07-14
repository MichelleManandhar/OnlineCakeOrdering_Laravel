<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    // Table
    protected $table = 'order';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');   
    }

    public function selects(){
        return $this->hasOne('App\CakeDesign');
    }
}
