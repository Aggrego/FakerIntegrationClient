<?php

namespace Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use Aggrego\IntegrationClient\Request;
use Aggrego\IntegrationClient\Response;
use Aggrego\IntegrationClient\ValueObject\Data;
use Faker\Factory as FakerFactory;

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
        return $request->getProfile()->getName()->getValue() == 'faker.digit';
    }

    public function handle(Request $request): void
    {
        $faker = FakerFactory::create();
        $digit = $faker->randomDigit;

        $data = json_encode(['value' => $digit]);

        $this->server->push(
            new Response(
                $request->getUuid(),
                $request->getProfile(),
                new Data($data)
            )
        );
    }
}
