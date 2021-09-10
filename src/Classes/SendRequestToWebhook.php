<?php

namespace Andresdevr\LaravelExceptions\Classes;

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
    public function __construct(string $url, $data = null)
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
    public static function instance(string $url, $data = null)
    {
        return new self($url, $data);
    }
}