<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\User;
use App\models\tag;
use App\models\skill;
use App\models\comment;
use App\models\category;
class video extends Model
{
    protected $fillable = [
        'name','desc', 'meta_desc','meta_keywords','youtube','user_id','cat_id','published','image'
    ];

    public function user(){
         return $this->belongsto(User::class);
        
        
    }

   
    public function category(){
      return $this->belongsTo(category::class,'cat_id');
        
       
    }

   
    public function skills(){
        return $this->belongstomany(skill::class,'skills_videos');
        
    }

    public function tags(){
        return $this->belongstomany(tag::class,'tags_videos');
        
    }

    public function comments(){
        return $this->hasmany(comment::class);
        
    }

    public function scopepublished(){
        return $this->where('published',1);
        
    }
}
