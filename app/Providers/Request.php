<?php

namespace App\Providers;

class Request
{
    private $parameters;
    private $files;
    private $headers;

    public function __construct()
    {
        $this->headers = getallheaders();
        $this->parameters = $this->parseIncomingParameters();
        $this->files = $_FILES;
    }

    private function parseIncomingParameters()
    {
        $params = $_REQUEST;
        if ($this->header('Content-Type') === 'application/json') {
            $jsonParams = json_decode(file_get_contents('php://input'), true);
            if (is_array($jsonParams)) {
                $params = array_merge($params, $jsonParams);
            }
        }
        return $params;
    }

    public function input($key, $default = null)
    {
        return $this->parameters[$key] ?? $default;
    }

    public function file($key)
    {
        return $this->files[$key] ?? null;
    }

    public function hasFile($key)
    {
        return isset($this->files[$key]);
    }

    public function header($key, $default = null)
    {
        $key = strtolower($key);
        $normalizedHeaders = array_change_key_case($this->headers, CASE_LOWER);
        return $normalizedHeaders[$key] ?? $default;
    }

    public function all()
    {
        return $this->parameters;
    }

    public function allFiles()
    {
        return $this->files;
    }

    public function session($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}
