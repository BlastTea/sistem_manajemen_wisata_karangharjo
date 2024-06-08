<?php

namespace App\Providers;

class Response {
    protected $headers = [];
    protected $body;
    protected $status = 200;

    public function status($code) {
        $this->status = $code;
        return $this;
    }

    public function header($key, $value) {
        $this->headers[$key] = $value;
        return $this;
    }

    public function json($data, $status = 200) {
        if (is_object($data) && method_exists($data, 'toJson')) {
            $data = $data->toJson();
        } else if (is_object($data) && method_exists($data, 'toArray')) {
            $data = json_encode($data->toArray());
        } else {
            $data = json_encode($data);
        }
        $this->header('Content-Type', 'application/json');
        $this->body = $data;
        $this->status = $status;
        return $this;
    }

    public function send() {
        if (!headers_sent()) {
            foreach ($this->headers as $key => $value) {
                header("$key: $value");
            }
        }
        http_response_code($this->status);
        echo $this->body;
    }
}
