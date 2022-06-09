<?php

require 'vendor/autoload.php';

use Tripay\Main;

$main =  new Main(
    'your-token',
);

$data = [
    'account_id'    =>   1,
];

$init  = $main->initAccountDetail();

$init->setForm($data); // IMPORTANT, this field is required

$init->getAccountDetail(); // return guzzle http client

$init->getRequest(); // return guzzle http client

$init->getJson(); //return json decode

$init->getStatus(); // return success, return bool type

$init->getResponse(); // return response

$init->getData(); // return data response