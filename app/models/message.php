<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
   protected $fillable= [
    'name','email', 'message'
];
}
