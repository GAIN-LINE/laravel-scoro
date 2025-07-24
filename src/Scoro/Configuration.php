<?php
namespace Scoro;

class Configuration {
    protected $accessToken;
    protected $host;

    public function setAccessToken($token) {
        $this->accessToken = $token;
    }

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function getHost() {
        return $this->host;
    }
}
