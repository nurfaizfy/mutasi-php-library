<?php

namespace Mutasi\Methods;

/**
 * Interface RequestInterface
 * @package Mutasi\Methods
 *
 * @author Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 */
interface RequestInterface {

    public function getRequest(string $url) : object;

    public function getResponse();

    public function getData();

    public function getJson();

    public function getStatus() : bool;

}