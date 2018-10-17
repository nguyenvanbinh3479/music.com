<?php
 if (! define('PATH_SYSTEM')) die ('bad requested!');

 //chuyển đổi chữ thành số
 function redirect_to($url)
 {
   header("location: $url");
 }

 function increment_once(&$index)
 {
   $index +=1;
   return $index;
 }

 function go_back()
 {
   if (isset($_SERVER["HTTP_REFERER"]))
   {
     header("location: " . $_SERVER["HTTP_REFERER"]);
   }
 }

?>