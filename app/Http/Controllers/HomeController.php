<?php

namespace App\Http\Controllers;
 use App\Http\Requests\frontend\comment\store;
//use App\Http\Requests\frontend\messages\store;
use App\models\skill;
use App\models\tag;
use App\models\message;
use App\models\video;
use App\models\page;
use App\models\User;
use App\models\comment;
use App\models\category;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([

            'commentupdate','commentadd','profileupdate'
        ]);
       // App::setLocale('ar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search=request('search');
        $videos=video::published()->orderby('id','desc');
        $no='';
         if(request()->has('search') && request()->get('search') !='')
         {
             $videos=$videos->where('name','like','%'. $search.'%');   

         }
        
           
         $videos=$videos->paginate(30);
        
         if(empty($videos[0]))
             {

                $no='no';
             }
     
        return view('home',compact('videos','no'));
    }


    public function welcome()
    {

        $videos=video::published()->orderby('id','desc')->paginate(9);

        $video_count=video::published()->count();
        $comment_count=comment::count();
        $tag_count=tag::count();
        return view('welcome',compact('videos','video_count','comment_count','tag_count'));
    }

    public function page($id,$slug=null)
    {

        $page=page::findorfail($id);          
        return view('front-end.page.index',compact('page'));
    }

    public function profile($id,$slug=null)
    {

        $user=User::findorfail($id);          
        return view('front-end.profile.index',compact('user'));
    }
     
    public function profileupdate(\App\Http\Requests\frontend\users\store $request)
    {

        $user=User::findorfail(auth()->user()->id);
        $array=[];
        if($request->email !=$user->email)
        {
            $array['email']=$request->email;
            $email=User::where('email',$request->email)->first();
            if($email==null){
                $array['email']=$request->email;
            }
        } 

        if($request->name !=$user->name)
        {
            $array['name']=$request->name;
        }

        if($request->password !='')
        {
            $array['password']=Hash::make($request->password);
        }

        if(!empty($array)){
            $user->update($array);
        }

        return redirect()->route('front.profile',['id'=>$user->id,'slug'=>slug($user->name)]);
    }


    public function categories($id)
    {
        $cat=category::findorfail($id);
        $videos=video::published()->where('cat_id',$id)->orderby('id','desc')->paginate(30);
        return view('front-end.category.index',compact('videos','cat'));
    }

    public function skills($id)
    {
        $skill=skill::findorfail($id);
        $videos=video::published()->wherehas('skills',function($query) use($id){
            $query->where('skill_id',$id); 

        })->orderby('id','desc')->paginate(30); ;
        return view('front-end.skill.index',compact('videos','skill'));
    }

    public function videoshow($id)
    {  
       
        $video=video::published()->findorfail($id);
        
        return view('front-end.video.index',compact('video'));
    }


    public function videotag($id)
    {   
       // $video=video::findorfail($id);
       $tag=tag::findorfail($id);
       //$tag= new tag;
       $videos= $tag->videos;
       $videos= $videos->where('published',1);
       //dd($videos);
       
       
        return view('front-end.tag.index',compact('videos','tag'));
    }


    public function commentupdate($id,store $request)
    {   
       $comment=comment::findorfail($id);
        if(($comment->user_id == auth()->user()->id) || auth()->user()->group =='admin'){
          
          $comment->update(["comment"=>$request->comment]);

        }
                                                                                                 
        return redirect()->route('frontend.videoshow',["id"=>$comment->video_id,"#comments"]);
    }

    public function commentadd($id,store $request)
    {   
        $video=video::findorfail($id);
        
          
         comment::create([

             'user_id'=>auth()->user()->id,
             'video_id'=>$video->id,
             'comment'=>$request->comment
         ]);

         
                                                                                                 
        return redirect()->route('frontend.videoshow',["id"=>$video->id,"#comments"]);
    }

    public function messagestore(\App\Http\Requests\frontend\messages\store $request)
    {   
        message::create($request->all());
                                                                                                                                  
        return redirect()->route('frontend.landing');
    }



}
