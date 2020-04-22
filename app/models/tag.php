<?php

namespace App\models;
use App\models\video;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable=['name'];
    public function videos(){
        return $this->belongstomany(video::class,'tags_videos');
        
    }
   
}
