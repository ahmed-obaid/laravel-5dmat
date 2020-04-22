<?php

namespace App\models;
use App\models\video;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name', 'meta_keywords', 'meta_desc',
    ];

    
   public function video(){
    return $this->hasmany(video::class);
     }

}

