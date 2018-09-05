<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\ResponseStrategy;

use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;

interface Strategy
{
    public function process(Key $key): Data;
}
