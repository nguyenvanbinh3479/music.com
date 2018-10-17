<?php
  if (! define('PATH_SYSTEM')) die ('Bad requested!');

  //chuyển đổi chữ thành số
  function string_to_int($str)
  {
    return sprintf("u%", crc32($str));
  }

  function csrf_token()
  {
    return bin2hex(random_bytes(16));
  }
 
?>