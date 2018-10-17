<?php

  // check system
  if (!define('PATH_SYSTEM')) die ('Bad requested!');

  // upload_library class
  class Upload_Library{

    // __construct function 
    public function __construct(){
      echo '<h3> Class Upload_Library được khởi tạo</h3>';     
    }

    // upload function 
    public function upload(){
      echo 'Method Upload được gọi tới';
    }

  }

?>