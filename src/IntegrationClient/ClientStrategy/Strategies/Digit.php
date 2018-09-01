<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies;

use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;

class Digit extends Strategy
{
    public function process(Key $key): Data
    {
        return $this->generateData(
            (string)$this->getFaker()->randomDigit
        );
    }
}
