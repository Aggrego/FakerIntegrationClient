<?php

namespace spec\Aggrego\FakerIntegrationClient\IntegrationClient\Exception;

use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\RuntimeException;
use PhpSpec\ObjectBehavior;
use RuntimeException as BaseRuntimeException;

class RuntimeExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RuntimeException::class);
        $this->shouldBeAnInstanceOf(BaseRuntimeException::class);
    }
}
