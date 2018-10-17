<?php
  if (!define('PATH_SYSTEM')) die ('Bad requested!');
  class Upload_Library
  {
    public function __construct()
    {
      echo '<h3> Class Upload_Library được khởi tạo</h3>';     
    }

    public function upload()
    {
      echo 'Method Upload được gọi tới';
    }
  }
?>