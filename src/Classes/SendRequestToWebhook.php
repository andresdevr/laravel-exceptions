<?php

namespace Andresdevr\LaravelExceptions\Classes;

use Illuminate\Support\Facades\Http;

class SendRequestToWebhook
{
    /**
     * The url of the request
     * 
     * @var string
     */
    private string $url;

    /**
     * The data to send
     * 
     * @var mixed
     */
    private $data;

	/**
     * The constructor of the class
     * 
     * @param string $url
     * @param mixed $data
     * @return void
     */
    public function __construct(string $url, $data = null) : void
    {
        $this->url = $url;
        $this->data = $data;   
    }

    /**
     * static method to access to the constructor 
     * 
     * @param string $url
     * @param mixed $data
     * @return \Andresdevr\LaravelExceptions\Classes\SendRequestToWebhook
     */
    public static function instance(string $url, $data = null) : self
    {
        return new self($url, $data);
    }

    /**
     * Send the request
     * 
     * @return void
     */
    public function send() : void
    {
        Http::post($this->url, [
            "data" => $this->data
        ]);
    }
}