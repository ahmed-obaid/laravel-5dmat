<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    protected $fillable = [
        'name','desc', 'meta_desc','meta_keywords'
    ];
}
