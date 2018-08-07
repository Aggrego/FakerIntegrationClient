<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\FakerIntegrationClient\IntegrationClient\Api\Client;
use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use Aggrego\IntegrationClient\Request;
use Aggrego\IntegrationClient\ValueObject\Key;
use Aggrego\IntegrationClient\ValueObject\Name;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Aggrego\IntegrationClient\ValueObject\Uuid;
use Aggrego\IntegrationClient\ValueObject\Version;
use PhpSpec\ObjectBehavior;

class ClientSpec extends ObjectBehavior
{
    function let(Server $server)
    {
        $this->beConstructedWith($server);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
        $this->shouldImplement(IntegrationClient::class);
    }

    function it_should_handle_request()
    {
        $request = new Request(
            new Uuid('1'),
            new Key([]),
            new Profile(new Name('faker.digit'), new Version('1.0'))
        );
        $this->handle($request)->shouldBeNull();
    }
}
