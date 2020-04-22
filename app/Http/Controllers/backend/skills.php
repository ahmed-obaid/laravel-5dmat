<?php

namespace App\Http\Controllers\backend;
use App\models\skill;
use Illuminate\Http\Request;
use App\Http\Requests\backend\skills\store; 
use App\Http\Controllers\Controller;

class skills extends backendcontroller
{
      
  public function __construct(skill $model, Request $request){

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
  
  
   return redirect()->route('skills.index');

 }


  public function update( store $request, $id )
  {
    
    $row=skill::findorfail($id); 
    
     
    
    $row->update($request->all());

    return redirect()->route('skills.index');
    
     
  }
}
