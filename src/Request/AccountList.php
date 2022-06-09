<?php

namespace Mutasi\Request;

use GuzzleHttp\Client;
use Mutasi\Methods\RequestInterface;
/**
 * Class Main
 * @package Mutasi\Request
 *
 * @author Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 */
class AccountList implements RequestInterface {

    /**
     * @var
     */
    private $token;

    public const URL = 'https://app.mutasi.co.id/api/accounts_list';

    /**
     * UserInfo constructor.
     * @param $token
     */
    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * @return object
     */
    public function getAccountList()
    {
        return $this->getRequest(self::URL);
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRequest(string $url) : object {
        $client = new Client();
        $res = $client->request('POST', $url, [
            'headers'   =>  [
                "Authorization" => 'Bearer '.$this->token
            ]
        ]);
        
        return $res;
    }

    /**
     * @return object
     */
    public function getResponse()
    {
        return $this->getAccountList()->getBody()->getContents();
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJson()
    {
        return json_decode($this->getAccountList()->getBody()->getContents());
    }

    /**
     * @return bool
     */
    public function getStatus() : bool
    {
        return $this->getJson()->status;
    }

    /**
     * @return object
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getData()
    {
        $json = $this->getJson();
        if ( isset($json->data) ) {
            return $json->data;
        }

        return $this->getResponse();
    }
}