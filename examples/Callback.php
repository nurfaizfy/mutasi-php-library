<?php

require 'vendor/autoload.php';

use Tripay\Main;

$main =  new Main(
    'your-token',
);

$init  = $main->initCallback();

$init->get(); // get all callback

$init->getJson(); // get json callback