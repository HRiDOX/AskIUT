<?php
 class Post
 {
     private $error="";

     public function create_post($userid, $data)
     {
         if(!empty($data['post']))
         {
            $post=addslashes($data['post']);
         }
         else
         {
             $this->error .= "Please type something to post!<br>";
         }
     }
     return $this->error;
    
 }