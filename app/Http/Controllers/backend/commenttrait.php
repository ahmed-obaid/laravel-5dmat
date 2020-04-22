<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\comments\store;
use App\models\comment;

trait commenttrait{


    public function commentstore(store $request){
          $rquestarray=$request->all()+['user_id'=>auth()->user()->id];
          comment::create($rquestarray);
          return redirect()->route('videos.index');
    }

    public function commentdelete($id){
         
      $commentdelete= comment::findorfail($id);
      $commentdelete->delete();
        return redirect()->route('videos.edit',['id'=>$commentdelete->video_id ,'#comments']);
  }

  public function commentupdate($id,store $request){
         
    $commentupdate= comment::findorfail($id);
    $commentupdate->update($request->all());
      return redirect()->route('videos.edit',['id'=>$commentupdate->video_id ,'#comments']);
}


}