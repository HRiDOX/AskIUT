<?php


function pagination_link(){

    $page_number = 1;
                            
                            //$page_number = isset($_Get['page']) ? (int)$_Get['page'] : 1;
                            //$page_number = ($page_number<1) ? 1 : $page_number;
                            if (isset($_GET['page'])) {
                              $page_number = (int)$_GET['page'];
                            }
                            if ($page_number<1) {
                                 $page_number = 1;
                            }
$arr['next_page'] = "";
$arr['prev_page'] = "";
//get current url

 $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
 $url .= "?";
 $next_page_link = $url;
 $prev_page_link = $url;
    $page_found = false;
 $num = 0;
  foreach ($_GET as $key => $value) {

   $num++;

    if ($num==1) {
      if ($key == "page")
    {
          $next_page_link  .= $key . "=" . ($page_number + 1);
          $prev_page_link  .= $key . "=" . ($page_number - 1);
          $page_found = true;                              
    }else
         {
            $next_page_link  .= $key . "=" . $value;
             $prev_page_link  .= $key . "=" . $value;


         }
                                    
     } else
         {
            if ($key == "page") {
            $next_page_link  .= $key . "=" . ($page_number + 1);
            $prev_page_link  .= $key . "=" . ($page_number - 1);
             $page_found = true;                            
                                            
         }else {
                $next_page_link  .= $key . "=" . $value;
                $prev_page_link  .= $key . "=" . $value;
            }                            
        }
                                
    }

    

  $arr['next_page'] = $next_page_link;
  $arr['prev_page'] = $prev_page_link;

  if(!$page_found){
        $arr['next_page'] = $next_page_link . "&page=2";
      $arr['prev_page'] = $prev_page_link . "&page=1";
        
    }
  

  return $arr;   
}


?>