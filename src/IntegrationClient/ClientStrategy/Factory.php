<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy;

use Aggrego\IntegrationClient\ValueObject\Profile;

interface Factory
{
    public function factory(Profile $profile): Strategy;
}
