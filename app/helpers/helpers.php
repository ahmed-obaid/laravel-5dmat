<?php


function is_active($routename){
    if($routename=='admin' && request()->segment(2) == null){

        echo'active';
    }else{
   return
    request()->segment(2) !== null && request()->segment(2)== $routename?'active':'';
    }

  

       
    
} 

function getyoutubeid($url){
   // preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);  
   
   preg_match("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $url, $match);
   //var_dump($match[0]);
   return isset($match[0])? $match[0]:null;

     
 }



 
function slug ($name){
    
    
    return strtolower(trim(str_replace(' ','-',$name)));
 
      
  }
