<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies;

use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;

class Word extends Strategy
{
    public function process(Key $key): Data
    {
        return $this->generateData(
            $this->getFaker()->word
        );
    }
}
