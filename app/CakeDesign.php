<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeDesign extends Model
{
    // Table
    protected $table = 'cake_design';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
