<?php

namespace Scoro;

use GuzzleHttp\Client;
use Scoro\Sdk\Configuration;
use Scoro\Sdk\Api\ProjectsApi;
use Scoro\Sdk\Api\TasksApi;

class ScoroManager
{
    protected Configuration $config;
    protected Client $client;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->client = new Client();
    }

    public function projects(): ProjectsApi
    {
        return new ProjectsApi($this->client, $this->config);
    }

    public function tasks(): TasksApi
    {
        return new TasksApi($this->client, $this->config);
    }
}
