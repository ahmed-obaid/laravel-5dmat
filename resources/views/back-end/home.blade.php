 @extends('back-end.layout.app')
 @section('title')
        homepage
 @endsection

 @section('content')

 @component('back-end.layout.header' )

  @slot('nav_title')
  
   homepage
  @endslot
  
@endcomponent

<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">videos</p>
                  <h3 class="card-title">{{\App\models\video::count()}} </h3>                            
                </div>
                <div class="card-footer">
                  <div class="stats"> 
                    <a href="{{route('videos.index')}}" class="warning-link">all videos</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">skills</p>
                  <h3 class="card-title">{{\App\models\skill::count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
              <a href="{{route('skills.index')}}" class="warning-link">
              <i class="material-icons">date_range</i> 
              all skill</a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">categories</p>
                  <h3 class="card-title">{{\App\models\category::count()}} </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <a href="{{route('categories.index')}}" class="warning-link">
                    <i class="material-icons">local_offer</i>
              all categories </a>  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-comments"></i>
                  </div>
                  <p class="card-category">comments</p>
                  <h3 class="card-title"> {{\App\models\comment::count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <a href="{{route('videos.index')}}" class="warning-link">
                    <i class="material-icons">update</i> check videos
                 </a> 
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--====================== latest comment =============== -->
<div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">latest comments</h4>
                  <p class="card-category">here you can see latest 10 comments</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>Name</th>
                      <th>video</th>
                      <th>comment</th>
                      <th>date</th>
                      <th>controller</th>
                    </tr></thead>
                    <tbody>
                    @foreach($comments as $comment)
                 <tr>
                        <td>{{$comment->id}}</td>
                        <td>
                            <a href="{{route('users.edit',['id'=>$comment->user->id])}}">
                            {{$comment->user->name}}
                            </a>
                      </td>
                      <td>
                          <a href="{{route('videos.edit',['id'=>$comment->video->id])}}">
                           {{$comment->video->name}}
                         </a>
                      </td>
                     
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->created_at}}</td>
                     <td>delete
                          <a href="{{route('comment.delete',['id'=>$comment->video->id])}}">
                           {{$comment->video->name}}
                         </a>
                     </td>   
                </tr>
                    @endforeach  
                    </tbody>
                  </table>
                  {!! $comments->links() !!}
                </div>
              </div>
            </div>
             
          </div>

 @endsection