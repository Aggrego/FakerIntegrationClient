<?php

namespace Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\FakerIntegrationClient\ResponseStrategy\Factory;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use Aggrego\IntegrationClient\Request;
use Aggrego\IntegrationClient\Response;

class Client implements IntegrationClient
{
    /** @var Server */
    private $server;

    /** @var Factory */
    private $factory;

    public function __construct(Server $server, Factory $factory)
    {
        $this->server = $server;
        $this->factory = $factory;
    }

    public function isSupported(Request $request): bool
    {
        try {
            $this->factory->factory($request->getProfile());
            return true;
        } catch (StrategyNotFoundException $e) {
            return false;
        }
    }

    public function handle(Request $request): void
    {
        $strategy = $this->factory->factory($request->getProfile());

        $this->server->push(
            new Response(
                $request->getUuid(),
                $request->getProfile(),
                $strategy->process($request->getKey())
            )
        );
    }
}
