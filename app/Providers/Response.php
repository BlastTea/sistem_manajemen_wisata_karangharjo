<?php

namespace App\Providers;

class Response {
    protected $headers = [];
    protected $body;
    protected $statusCode = 200;

    public function setStatusCode($code) {
        $this->statusCode = $code;
        return $this;
    }

    public function header($key, $value) {
        $this->headers[$key] = $value;
        return $this;
    }

    public function json($data) {
        $this->header('Content-Type', 'application/json');
        $this->body = json_encode($data);
        return $this;
    }

    public function send() {
        if (!headers_sent()) {
            foreach ($this->headers as $key => $value) {
                header("$key: $value");
            }
        }
        http_response_code($this->statusCode);
        echo $this->body;
    }
}
