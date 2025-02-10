<?php

namespace Core\Http;

class Request
{

    private string $uri;

    private array $globals;


    public function __construct()
    {
        $this->globals = $this->resolveGlobals();

        $uri =  parse_url($this->globals['REQUEST_URI'], PHP_URL_PATH);
        $this->uri = rtrim($uri, '/') ? : '/';




    }
    public function getGlobals()
    {
        return $this->globals;

    }

    public function getUri()
    {
        return $this->uri;
    }


    public function resolveGlobals()
    {
        return $_SERVER;
    }




}