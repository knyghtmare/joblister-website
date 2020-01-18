<?php

// start the session
session_start();

// config file
require_once 'config.php';

//include helpers
require_once 'helpers/system_helper.php';

// autoload the classes
spl_autoload_register(function ($class) {
  require_once 'lib/'.$class.'.php';
});

 ?>
