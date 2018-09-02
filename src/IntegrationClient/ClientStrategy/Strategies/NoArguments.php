<?php

declare(strict_types = 1);

namespace Aggrego\FakerIntegrationClient\IntegrationClient\ClientStrategy\Strategies;

use Aggrego\FakerIntegrationClient\IntegrationClient\Exception\StrategyNotFoundException;
use Aggrego\IntegrationClient\ValueObject\Data;
use Aggrego\IntegrationClient\ValueObject\Key;
use Aggrego\IntegrationClient\ValueObject\Name;
use Aggrego\IntegrationClient\ValueObject\Profile;

class NoArguments extends Strategy
{
    private const AVAILABLE = [
        //Faker\Provider\Base
        'randomDigit',
        'randomDigitNotNull',
        'randomLetter',
        //Faker\Provider\Lorem
        'word',
        //Faker\Provider\DateTime
        'timezone',
        //Faker\Provider\Internet
        'email',
        'safeEmail',
        'freeEmail',
        'companyEmail',
        'freeEmailDomain',
        'safeEmailDomain',
        'userName',
        'password',
        'domainName',
        'domainWord',
        'tld',
        'url',
        'slug',
        'ipv4',
        'localIpv4',
        'ipv6',
        'macAddress',
        //Faker\Provider\UserAgent
        'userAgent',
        'chrome',
        'firefox',
        'safari',
        'opera',
        'internetExplorer',
    ];

    /** @var string  */
    private $fakerFunction;

    private function __construct(string $fakerFunction)
    {
        if (!in_array($fakerFunction, self::AVAILABLE)) {
            throw new StrategyNotFoundException(
                sprintf('For given faker function %s strategy not found argument less.', $fakerFunction)
            );
        }
        $this->fakerFunction = $fakerFunction;
    }

    public static function create(Profile $profile): self
    {
        return new self(
            self::extractName($profile->getName())
        );
    }

    public function process(Key $key): Data
    {
        $fakerFunction = $this->fakerFunction;

        return $this->generateData(
            (string)$this->getFaker()->$fakerFunction
        );
    }

    private static function extractName(Name $name): string
    {
        $data = explode('.', $name->getValue());
        return $data[1];
    }
}
