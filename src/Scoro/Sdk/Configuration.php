<?php
namespace Scoro\Sdk;

class Configuration {
    protected $accessToken;
    protected $companyAccountId;
    protected $host;

    public function setAccessToken($token) {
        $this->accessToken = trim($token);
    }

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function setHost($host) {
        $this->host = rtrim($host, '/');
    }

    public function getHost() {
        return $this->host;
    }

    public function setCompanyAccountId($company_id) {
        $this->companyAccountId = $company_id;
    }

    public function getCompanyAccountId() {
        return $this->companyAccountId;
    }
}
