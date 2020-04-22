<?php

namespace App\Http\Controllers\backend;
use App\models\video;
use App\models\skill;
use App\models\tag;
use App\models\comment;
use App\models\category;
use Illuminate\Http\Request;
use App\Http\Requests\backend\videos\store;




class videos extends backendcontroller
{
   use commenttrait; 
    public function __construct(video $model, Request $request){
  
     parent::__construct($model,$request);
     
    }

   
    protected function with(){

      return  ['category','user',];
    }
   
     
     
      
     protected function filter($rows){
    
      
         $rows=$rows->where('name',request()->get('name'));
    
        
       return $rows;
    
     }
      protected function categ(){

          
        return[
          'categories'=>category::get(),
          'skills'=>skill::get(),
          'tags'=>tag::get()
      
      ];
      }
 

    
     public function store (store $request)
     {
      
      $file=$request->file('image');
        $filename=time().str_random('10').'.'.$file->getclientoriginalextension();
        $file->move(public_path('uploads'),$filename);


        $requestarray=['user_id'=>auth()->user()->id,'image'=>$filename]+$request->all() ;
        
        $row=$this->model->create($requestarray);

        
       //add skills/////////////
        if(isset($requestarray['skills'])&& !empty($requestarray['skills']))
          {

            $row->skills()->sync($requestarray['skills']);
          }

          //add tags//////////////////
          if(isset($requestarray['tags'])&& !empty($requestarray['tags']))
          {

            $row->tags()->sync($requestarray['tags']);
          }
      
       return redirect()->route('videos.index');
    
     }
    
    
      public function update( store $request, $id )
      {
        $row=video::findorfail($id); 
        $requestarray=$request->all() ; 
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $filename=time().str_random('10').'.'.$file->getclientoriginalextension();
          $file->move(public_path('uploads'),$filename);
          $requestarray=['image'=>$filename]+$request->all() ;
        }else{
           
          $requestarray=+['image'=>$row->image];
        }


      
       
        
        
        
        $row->update($requestarray);
        if(isset($requestarray['skills'])&& !empty($requestarray['skills']))
        {

          $row->skills()->sync($requestarray['skills']);
        }
    
        return redirect()->route('videos.index');
        
         
      }
}
