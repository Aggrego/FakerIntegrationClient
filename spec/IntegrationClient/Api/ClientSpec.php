<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\FakerIntegrationClient\IntegrationClient\Api\Client;
use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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
}
