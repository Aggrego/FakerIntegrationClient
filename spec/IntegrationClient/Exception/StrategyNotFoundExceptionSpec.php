<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\Exception;

use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\RuntimeException;
use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\StrategyNotFoundException;
use PhpSpec\ObjectBehavior;

class StrategyNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StrategyNotFoundException::class);
        $this->shouldBeAnInstanceOf(RuntimeException::class);
    }
}
