<?php

namespace App\Http\Controllers\backend;
use App\models\tag;
use Illuminate\Http\Request;
use App\Http\Requests\backend\tags\store;
use App\Http\Controllers\Controller;

class tags extends backendcontroller
{  
    public function __construct(tag $model, Request $request){
  
      parent::__construct($model,$request);
  }
    
   protected function filter($rows){
  
    
       $rows=$rows->where('name',request()->get('name'));
  
      
     return $rows;
  
   }
  
   public function store (store $request)
   {
      $requestarray=$request->all();
      $this->model->create($requestarray);
    
    
     return redirect()->route('tags.index');
  
   }
  
  
    public function update( store $request, $id )
    {
      
      $row=tag::findorfail($id); 
      
       
      
      $row->update($request->all());
  
      return redirect()->route('tags.index');
      
       
    }
    
}
