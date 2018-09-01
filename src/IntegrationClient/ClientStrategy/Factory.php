<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy;

use Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies\Digit;
use Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies\Word;
use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Composer\Semver\Comparator;
use Composer\Semver\VersionParser;

class Factory
{
    /**
     * @param Profile $profile
     * @return Strategy
     * @throws StrategyNotFoundException
     */
    public function factory(Profile $profile): Strategy
    {
        $versionNumber = (new VersionParser())->normalize($profile->getVersion()->getValue());
        $profileName = $profile->getName()->getValue();

        if (Comparator::greaterThan('1.0.0.0', $versionNumber)) {
            throw new StrategyNotFoundException(
                sprintf('For given profile %s:%s strategy not found', $profileName, $versionNumber)
            );
        }

        $profileName = $profileName;
        switch ($profileName) {
            case 'faker.digit':
                return new Digit();
            case 'faker.word':
                return new Word();
        }

        throw new StrategyNotFoundException(
            sprintf('For given profile %s:%s strategy not found', $profile->getName()->getValue(), $versionNumber)
        );
    }
}
