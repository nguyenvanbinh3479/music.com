<?php

  // check system
  if (! define('PATH_SYSTEM')) die ('bad requested!');

  // redirect_to function
  function redirect_to($url){
    header("location: $url");
  }

  // increment_once function
  function increment_once(&$index){
    $index +=1;
    return $index;
  }

  // go_back function
  function go_back(){
    if (isset($_SERVER["HTTP_REFERER"])){
      header("location: " . $_SERVER["HTTP_REFERER"]);
    }
  }

?>