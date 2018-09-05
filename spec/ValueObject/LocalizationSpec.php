<?php

namespace spec\Aggrego\FakerIntegrationClient\ValueObject;

use Aggrego\FakerIntegrationClient\ValueObject\Localization;
use PhpSpec\ObjectBehavior;

class LocalizationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Localization::class);
    }
}
