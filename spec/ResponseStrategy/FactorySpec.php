<?php

namespace spec\Aggrego\FakerIntegrationClient\ResponseStrategy;

use Aggrego\FakerIntegrationClient\ResponseStrategy\Factory;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Strategy;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\ValueObject\Profile;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Factory::class);
    }

    function it_should_throw_exception_when_unknown_name()
    {
        $profile = Profile::create('faker.test', '1.0');
        $this->shouldThrow(StrategyNotFoundException::class)->during('factory', [$profile]);
    }

    function it_should_throw_exception_when_higher_version_than_one()
    {
        $profile = Profile::create('faker.randomDigit', '2.1');
        $this->shouldThrow(StrategyNotFoundException::class)->during('factory', [$profile]);
    }

    function it_should_return_strategy_for_correct_profile()
    {
        $profile = Profile::create('faker.randomDigit', '1.0');
        $this->factory($profile)->shouldReturnAnInstanceOf(Strategy::class);
    }
}
