<?php

namespace App\Providers;

class Request {
    private $parameters;
    private $files;
    private $headers;

    public function __construct() {
        $this->parameters = $_REQUEST;
        $this->files = $_FILES;
        $this->headers = getallheaders();
    }

    public function input($key, $default=null) {
        return isset($this->parameters[$key]) ? $this->parameters[$key] : $default;
    }

    public function file($key) {
        return $this->files[$key] ?? null;
    }

    public function hasFile($key) {
        return isset($this->files[$key]);
    }

    public function header($key, $default = null) {
        $key = strtolower($key);
        return $this->headers[$key] ?? $default;
    }

    public function all() {
        return $this->parameters;
    }

    public function allFiles() {
        return $this->files;
    }

    public function session($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public function setSession($key, $value) {
        $_SESSION[$key] = $value; 
    }
}