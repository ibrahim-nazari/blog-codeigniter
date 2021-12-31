<?php

 function display_error($validation,$field){
     if($validation->hassError($field)){
         return $validation->getError($field);
     }else{
         return false;
     }
 }




?>