<?php

  // check system
  if (!define('PATH_SYSTEM')) die ('Bad requested!');

  // string_to_int function
  function string_to_int($str){
    return sprintf("%u", crc32($str));
  }

  // csrf_token function
  function csrf_token(){
    return bin2hex(random_bytes(16));
  }
 
?>