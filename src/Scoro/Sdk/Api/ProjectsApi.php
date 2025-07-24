<?php
namespace Scoro\Sdk\Api;

class ProjectsApi {
    protected $client;
    protected $config;

    public function __construct($client, $config) {
        $this->client = $client;
        $this->config = $config;
    }

    public function list(array $params = [])
    {
        // Default to empty request if nothing passed
        if (empty($params)) {
            $params = new \stdClass(); // So JSON becomes {} not []
        }

        return $this->client->get($this->config->getHost() . '/projects/list', [
            'headers' => [
                'Accept'        => 'application/json',
            ],
            'json' => [
                'request' => new \stdClass(),
                'apiKey' => $this->config->getAccessToken(),
                'company_account_id' => $this->config->getCompanyAccountId(),
                "bookmark" => [
                    "bookmark_id" => "111"
                ]
            ],
        ])->getBody()->getContents();
    }
}
