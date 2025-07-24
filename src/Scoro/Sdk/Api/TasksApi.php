<?php
namespace Scoro\Sdk\Api;

use stdClass;

class TasksApi {
    protected $client;
    protected $config;

    public function __construct($client, $config) {
        $this->client = $client;
        $this->config = $config;
    }

    public function create(array $data) {
        $request = new stdClass();
        $request->event_name = $data['name'];
        return $this->client->post($this->config->getHost() . '/tasks/modify', [
            'headers' => ['Authorization' => $this->config->getAccessToken()],
            'json' => [
                'request' => $request,
                'apiKey' => $this->config->getAccessToken(),
                'company_account_id' => $this->config->getCompanyAccountId(),
            ],
        ])->getBody()->getContents();
    }

    public function update($id, array $data) {
        return $this->client->put($this->config->getHost() . "/task/{$id}", [
            'headers' => ['Authorization' => $this->config->getAccessToken()],
            'json' => $data
        ])->getBody()->getContents();
    }

    public function delete($id) {
        return $this->client->delete($this->config->getHost() . "/task/{$id}", [
            'headers' => ['Authorization' => $this->config->getAccessToken()],
        ])->getBody()->getContents();
    }
}
