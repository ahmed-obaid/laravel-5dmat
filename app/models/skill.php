<?php

namespace App\models;
use App\models\video;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $fillable = [
        'name'
    ];
    public function videos(){
        return $this->belongstomany(video::class,'skills_videos');
    }
}
