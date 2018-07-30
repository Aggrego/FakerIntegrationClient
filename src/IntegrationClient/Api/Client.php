<?php

namespace Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use Aggrego\IntegrationClient\Request;

class Client implements IntegrationClient
{
    /** @var Server */
    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function isSupported(Request $request): bool
    {

    }

    public function handle(Request $request): void
    {

    }
}
