<?php

namespace App\Http\Controllers\backend;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\users\store;
use App\Http\Requests\backend\users\update;
use Illuminate\Support\Facades\Validator;


class users extends backendcontroller
{

  public function __construct(User $model, Request $request){
    
      parent::__construct($model,$request);
  }
    
   protected function filter($rows){
  
    
       $rows=$rows->where('name',request()->get('name'));

      
     return $rows;

   }
  
   public function store (store $request)
   {

   
    $requestarray=$request->all();
   // dd($requestarray);
   
    $requestarray['password']=Hash::make($requestarray['password']);
    $this->model->create($requestarray);               
     return redirect()->route('users.index');
 
   }

    public function update( Request $request, $id )
    {
      
      $row=User::findorfail($id); 
      
      $requestarray=[
        'name' =>$request->name,
        'email'=>$request->email
      ];
      if($request->has('password')&& $request->get('password')!='')
      {
        $requestarray=$requestarray +['password'=>Hash::make($request->password)];

      }
      $row->update($requestarray);

      return redirect()->route('users.index');
      
       
    }

   
}
