<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy;

use Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Factory;
use Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategy;
use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\ValueObject\Name;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Aggrego\IntegrationClient\ValueObject\Version;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Factory::class);
    }

    function it_should_throw_exception_when_unknown_name(Profile $profile)
    {
        $profile->getName()->willReturn(new Name('faker.test'));
        $profile->getVersion()->willReturn(new Version('1.1'));
        $this->shouldThrow(StrategyNotFoundException::class)->during('factory', [$profile]);
    }

    function it_should_throw_exception_when_higher_version_than_one(Profile $profile)
    {
        $profile->getName()->willReturn(new Name('faker.randomDigit'));
        $profile->getVersion()->willReturn(new Version('2.1'));
        $this->shouldThrow(StrategyNotFoundException::class)->during('factory', [$profile]);
    }

    function it_should_return_strategy_for_correct_profile()
    {
        $profile = new Profile(new Name('faker.randomDigit'), new Version('1.0'));
        $this->factory($profile)->shouldReturnAnInstanceOf(Strategy::class);
    }
}
