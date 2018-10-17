<?php

 //khai báo 1 hằng số với tên và đường dẫn hiện tại
 define('PATH_ROOT', __DIR__);
 define('PATH_PUBLIC', __DIR__.'/public');
 define('PATH_SYSTEM', __DIR__.'/system');
 define('PATH_APPLICATION', __DIR__.'/admin');

 //lấy thông số cấu hình
 require (PATH_SYSTEM.'/config/config.php');

 //chạy hệ thống
 include_once (PATH_SYSTEM.'/core/FT_Common.php');

 //chương trình chính
 FT_load();
 
?>