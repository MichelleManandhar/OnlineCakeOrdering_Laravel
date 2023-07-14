<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    // Table
    protected $table = 'cakes';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

}
