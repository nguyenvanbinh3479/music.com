<?php

  /**
   * @package     FT_Framework
   * @author      Freetuts Dev Team
   * @email       freetuts.net@gmail.com
   * @copyright   Copyright (c) 2015
   * @since       Version 1.0
   * @filesource  system/core/loader/FT_Helper_Loader.php
   */

  // FT_Helper_Loader class
  class FT_Helper_Loader{
    /**
     * Load helper
     *
     * @param   string
     * @desc    hàm load helper, tham số truyền vào là tên của helper
     */

    // load function
    public function load($helper){
      $helper = ucfirst($helper) . '_Helper';
      require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
  }

?>