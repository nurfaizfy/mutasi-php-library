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
class SearchAmount implements RequestInterface {

    /**
     * @var
     */
    private $token;
    private $form;

    public const URL = 'https://app.mutasi.co.id/api/search_amount';

    /**
     * UserInfo constructor.
     * @param $token
     */
    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * @param array $data
     */
    public function setForm(array $form) {
        $this->form = $form;
    }

    /**
     * @return mixed
     */
    public function getForm() {
        return $this->form;
    }

    /**
     * @return object
     */
    public function getSearchAmount()
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
            'form_params' => $this->getForm(),
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
        return $this->getSearchAmount()->getBody()->getContents();
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJson()
    {
        return json_decode($this->getSearchAmount()->getBody()->getContents());
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