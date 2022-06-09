<?php

namespace Mutasi;

use Mutasi\Request\UserInfo;
use Mutasi\Request\AccountList;
use Mutasi\Request\AccountDetail;
use Mutasi\Request\Transaction;
use Mutasi\Request\SearchAmount;
use Mutasi\Request\Callback;

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

    /**
     * @return AccountList
     */
    public function initAccountList() {
        return new AccountList(
            $this->token
        );
    }

    /**
     * @return AccountDetail
     */
    public function initAccountDetail() {
        return new AccountDetail(
            $this->token
        );
    }

    /**
     * @return Transaction
     */
    public function initTransaction() {
        return new Transaction(
            $this->token
        );
    }

    /**
     * @return SearchAmount
     */
    public function initSearchAmount() {
        return new SearchAmount(
            $this->token
        );
    }

    /**
     * @return Callback
     */
    public function initCallback() {
        return new Callback(
            $this->token
        );
    }
}