<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy;

use Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies\NoArguments;
use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Assert\Assertion;
use Composer\Semver\Comparator;
use Composer\Semver\VersionParser;

class Factory
{
    /**
     * @param Profile $profile
     * @return Strategy
     * @throws StrategyNotFoundException
     * @throws \Assert\AssertionFailedException
     */
    public function factory(Profile $profile): Strategy
    {
        $versionNumber = (new VersionParser())->normalize($profile->getVersion()->getValue());
        $profileName = $profile->getName()->getValue();
        Assertion::regex($profileName, '~^faker\.([a-zA-Z0-9]+)$~');

        if (Comparator::greaterThan($versionNumber, '1.0.0.0')) {
            throw new StrategyNotFoundException(
                sprintf('For given profile %s:%s strategy not found', $profileName, $versionNumber)
            );
        }

        try {
            return NoArguments::create($profile);
        } catch (StrategyNotFoundException $e) {
            throw new StrategyNotFoundException(
                sprintf('For given profile %s:%s strategy not found', $profileName, $versionNumber),
                0,
                $e
            );
        }
    }
}
