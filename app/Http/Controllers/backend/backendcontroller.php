<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\users\store;
use Illuminate\Http\Request;
use App\models\category;
class  backendcontroller extends Controller
 {

  protected $model;
  protected $request;

  public function __construct( $model,$request=null){
        $this->model=$model;
        $this->request=$request;
  }
  

 public function index(){
        $rows=$this->model;
        $request =$this->request;
         if($request){
        if($request->has('name')&& $request->get('name')!='')
           {
             $rows=$this->filter($rows);
           }
          }
          

         $routename=$this->getClassNameFrommodel();
         $pagetitle=$this->pluralmodelname().' control';
         $pagedesc='here you can add/edite/delete '.$this->pluralmodelname();
         $folder= $routename; 
         $with=$this->with();

    
         if(!empty($with)){
            $rows=$rows->with($with);

         }
        $rows=$rows->paginate(2); 

        return view('back-end.'.$this->getClassNameFrommodel().'.index',compact(
          'rows',
          'pagetitle',
          'pagedesc',
          'routename',
          'folder'
        )) ;
  }

  public function edit($id)
  {
  
   
         $row=$this->model->findorfail($id);
         $skill_id=[];
         $tag_id=[];
         $comments=0;

       if(request()->segment(2)=='videos')
         {
            foreach($row->skills as $skill)
            {
              $skill_id[]+= $skill->id;
              

            }

            
            foreach($row->tags as $tag)
            {
              $tag_id[]+= $tag->id;
              
            }
         
              $comments= $row->comments;          
         
        } 
        
        
       // dd($comments);
        
       
         $routename=$this->getClassNameFrommodel();
         $pagetitle=$this->pluralmodelname();
         
         $pagedesc='here you can add/edite/delete ('. $row->name.')';
         $folder= $routename; 
         $categories=$this->categ();
        
      return view('back-end.'.$this->getClassNameFrommodel().'.edit',compact(
        'row',
        'pagetitle',
        'pagedesc',
        'routename',
        'folder',
       'skill_id',
       'tag_id',
        'comments'
      ))->with($categories);
  } 
  
  public function create(){

    
    $pagetitle=$this->modelname().' control';
    $pagedesc='here you can add/edite/delete '.$this->modelname();
    $folder=$this->getClassNameFrommodel();
    $categories=$this->categ();
  
    $rows=$this->model->paginate(10);
   
    return view('back-end.'.$this->getClassNameFrommodel().'.create',compact(
      'rows',
      'pagedesc',
      'pagetitle',
      'folder',
      //'categories'
      
    ))->with($categories) ;
  }
   
  
  

  public function destroy($id)
  {
    $this->model->findorfail($id)->delete();
    return redirect()->route($this->getClassNameFrommodel().'.index');
     
  }
 // protected function filter($rows){
  // return $rows;
 //  }

 protected function modelname(){

  return  class_basename($this->model);

}
 protected function pluralmodelname(){

  return str_plural($this->modelname()  );

}


  protected function getClassNameFrommodel(){

    return  strtolower($this->pluralmodelname());
  }

 protected function with(){
   return [];
 }
 protected function categ(){
  return [  ];
}

}