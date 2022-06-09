<?php

namespace Mutasi;

use Mutasi\Request\UserInfo;

/**
 * Class Main
 * @package Mutasi
 *
 * @author Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 */
class Main {

    /**
     * @var
     */
    private $token;

    /**
     * Set Parameter
     * 
     * Main constructor.
     * @param string $token
     */
    public function __construct(
        string $token = null
    ) {
        try {
            $this->token = $token;
            if (is_null($this->token) || $this->token == '') {
                throw new \Exception('Token harus diisi!');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * @return UserInfo
     */
    public function initUserInfo() {
        return new UserInfo(
            $this->token
        );
    }
}