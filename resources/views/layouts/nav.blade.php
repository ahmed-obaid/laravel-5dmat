<nav class="navbar navbar-expand-lg fixed-top bg-danger " style='color:#f50;' >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{route('home')}}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" >
       {{__('main.logo')}}
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
           <li class='nav-item'>
                   <div class="btn-group">
                          <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{__('main.language')}} 
                           </a>
                       <div class="dropdown-menu">                    
                         <a class="dropdown-item" href="{{route('lang',['locale'=>'ar'])}}">arabic</a>  
                         <a class="dropdown-item" href="{{route('lang',['locale'=>'en'])}}">english</a>                                                                                                     
                       </div>

                       </a>
                                        
                                                                                                                                  
                       
                   </div>
          </li>
          <li class="nav-item">
                  <div class="btn-group">
                     <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{__('main.skills')}} 
                     </a>
                       <div class="dropdown-menu">
                        @foreach($skills as $skill)
                         <a class="dropdown-item" href="{{route('front.skill',['id'=>$skill->id])}}">{{$skill->name}}</a>
                          
                        @endforeach 
                       </div>
                   </div>
          </li>
          <li class="nav-item">
                  <div class="btn-group">
                     <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{__('main.categories')}} 
                     </a>
                       <div class="dropdown-menu">

                        @foreach($categories as $category)
                         <a class="dropdown-item" href=" {{route('front.category',['id'=>$category->id])}}">{{$category->name}}</a>
                          
                        @endforeach
                          
                            
                            
                       </div>
                   </div>
          </li>
         
          @guest
            <li class="nav-item">
              <a href="{{url('/login')}} " target="_blank" class="nav-link"> login</a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/register')}}" target="_blank" class="nav-link"> register</a>
            </li>
         @else
         <div class="btn-group">
           <li class='nav-item'>
             <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{Auth::user()->name}}
              </a>
              
                   <div class="dropdown-menu">                                                                                                                                
                       <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                        </form>                                                                                                   
                  
                   
                        <a href='{{route("front.profile",["id"=>auth()->user()->id])}}' class="dropdown-item">my profile</a>
                  </div>
             </li>  
           </div>


         @endguest  
         <li class="nav-item">
            <form class="form-inline ml-auto"style='margin-top:15px' action='{{route("home")}}'>
              <div class="form-group has-white">
                <input type="text" name='search' class="form-control" placeholder="{{ __('main.search') }}">
              </div>
            </form>
         </li>
        </ul>
      </div>
    </div>
  </nav>