<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\ResponseStrategy\Strategies;

use Aggrego\FakerIntegrationClient\ResponseStrategy\Strategy as InterfaceStrategy;
use Aggrego\IntegrationClient\ValueObject\Data;
use Faker\Factory as FakerFactory;
use Faker\Generator;

abstract class Strategy implements InterfaceStrategy
{
    protected function getFaker(): Generator
    {
        return FakerFactory::create();
    }

    protected function generateData(string $data): Data
    {
        $data = json_encode(['value' => $data]);
        return new Data($data);
    }
}
