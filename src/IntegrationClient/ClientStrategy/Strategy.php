<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy;

use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;

interface Strategy
{
    public function process(Key $key): Data;
}
