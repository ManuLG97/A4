<?php

  //developed mode
  ini_set('display_errors','On');
  //autoload
  require __DIR__.'/vendor/autoload.php';

  use Rentit\App;
  use Rentit\Session;

  App::run();