<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\Api;

use Aggrego\FakerIntegrationClient\IntegrationClient\Api\Client;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Factory;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Strategy;
use Aggrego\IntegrationClient\Api\Client as IntegrationClient;
use Aggrego\IntegrationClient\Api\Server;
use Aggrego\IntegrationClient\Request;
use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Aggrego\IntegrationClient\ValueObject\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function let(Server $server, Factory $factory, Strategy $strategy)
    {
        $strategy->process(Argument::type(Key::class))->willReturn(new Data('test'));
        $factory->factory(Argument::type(Profile::class))->willReturn($strategy);
        $this->beConstructedWith($server, $factory);
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
            Profile::create('faker.randomDigit', '1.0')
        );
        $this->handle($request)->shouldBeNull();
    }
}
