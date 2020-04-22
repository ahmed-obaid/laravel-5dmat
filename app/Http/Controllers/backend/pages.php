<?php

namespace App\Http\Controllers\backend;
use App\models\page;
use Illuminate\Http\Request;
 
use App\Http\Requests\backend\pages\store;


class pages extends backendcontroller
{
    
    public function __construct(page $model, Request $request){
  
        parent::__construct($model,$request);
          
    }
   
      
     protected function filter($rows){
    
      
         $rows=$rows->where('name',request()->get('name'));
    
        
       return $rows;
    
     }
    
     public function store (store $request)
     {
       //dd('model');
        $requestarray=$request->all();
        $this->model->create($requestarray);
      
      
       return redirect()->route('pages.index');
    
     }
    
    
      public function update( store $request, $id )
      {
        dd($request->all());
        $row=page::findorfail($id); 
        
         
        
        $row->update($request->all());
    
        return redirect()->route('pages.index');
        
         
      }
}
