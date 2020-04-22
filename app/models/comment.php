<?php

namespace App\models;
use App\models\User;
use App\models\video;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
   protected $fillable=['user_id','video_id','comment'];

    public function user(){
       return $this->belongsto(User::class);
    }
    public function video(){
        return $this->belongsto(video::class);
     }
}
