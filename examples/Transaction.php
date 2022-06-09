<?php

require 'vendor/autoload.php';

use Tripay\Main;

$main =  new Main(
    'your-token',
);

$data = [
    'account_id'    =>   1,
    'from'          =>  date('Y-m-d'),
    'to'            =>  date('Y-m-d'),
];

$init  = $main->initTransaction();

$init->setForm($data); // IMPORTANT, this field is required

$init->getTransaction(); // return guzzle http client

$init->getRequest(); // return guzzle http client

$init->getJson(); //return json decode

$init->getStatus(); // return success, return bool type

$init->getResponse(); // return response

$init->getData(); // return data response