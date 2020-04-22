<?php

namespace App\Http\Controllers\backend;
use App\models\message;
use App\Http\Requests\backend\messages\store;
use Illuminate\Support\Facades\Mail; 
use App\Mail\replaycontact; 

class messages extends backendcontroller
{
   
    public function __construct(message $model){
        
        parent::__construct($model);

        
    }

    public function replay(store $request,$id){
        $message=$this->model->findorfail($id);
        $replay=$request->replay; 
        Mail::send(new replaycontact($message,$replay));
     
          return redirect()->route('messages.edit',['id'=>$message->id]);
        
    }
}
