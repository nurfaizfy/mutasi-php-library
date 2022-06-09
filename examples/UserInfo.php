<?php

require 'vendor/autoload.php';

use Tripay\Main;

$main =  new Main(
    'your-token',
);

$init  = $main->initUserInfo();

$init->getUserInfo(); // return guzzle http client

$init->getRequest(); // return guzzle http client

$init->getJson(); //return json decode

$init->getStatus(); // return success, return bool type

$init->getResponse(); // return response

$init->getData(); // return data response