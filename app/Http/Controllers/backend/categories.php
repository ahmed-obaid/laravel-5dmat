<?php

namespace App\Http\Controllers\backend;
use App\models\category;
use Illuminate\Http\Request;
use App\Http\Requests\backend\categories\store;
 

class categories extends backendcontroller
{
    
  public function __construct(category $model, Request $request){

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
  
  
   return redirect()->route('categories.index');

 }


  public function update( store $request, $id )
  {
    
    $row=category::findorfail($id); 
    
     
    
    $row->update($request->all());

    return redirect()->route('categories.index');
    
     
  }
}
