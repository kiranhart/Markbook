<?php

  //Load the composer stuff
  require "vendor/autoload.php";

  // Load Session Helper
  require_once 'helpers/session_helper.php';

  // Load Config
  require_once 'config/config.php';
  
  // Load Helpers
  require_once 'helpers/url_helper.php';

  // Load Eamil Helpers
  require_once 'helpers/email_helper.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
