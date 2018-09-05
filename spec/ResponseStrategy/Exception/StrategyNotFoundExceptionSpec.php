<?php

namespace spec\Aggrego\FakerIntegrationClient\ResponseStrategy\Exception;

use Aggrego\FakerIntegrationClient\Exception\RuntimeException;
use Aggrego\FakerIntegrationClient\ResponseStrategy\Exception\StrategyNotFoundException;
use PhpSpec\ObjectBehavior;

class StrategyNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StrategyNotFoundException::class);
        $this->shouldBeAnInstanceOf(RuntimeException::class);
    }
}
