<?php

namespace Mutasi\Request;

use Symfony\Component\HttpFoundation\Request;
/**
 * Class Main
 * @package Mutasi\Request
 *
 * @author Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 */
class Callback {

    /**
     * @var
     */
    public $request;

    /**
     * UserInfo constructor.
     * @param $token
     */
    public function __construct($token) {
        $this->token = $token;
        $this->request = Request::createFromGlobals();
    }

    /**
     * @return false|resource|string|null
     */
    public function get() {
        return $this->request->getContent();
    }

    /**
     * @return mixed
     */
    public function getJson() {
        return json_decode($this->get());
    }
}