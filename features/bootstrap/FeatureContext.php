<?php

use Aggrego\FakerIntegrationClient\IntegrationClient\Api\Client;
use Aggrego\IntegrationClient\Request;
use Aggrego\IntegrationClient\ValueObject\Key;
use Aggrego\IntegrationClient\ValueObject\Name;
use Aggrego\IntegrationClient\ValueObject\Profile;
use Aggrego\IntegrationClient\ValueObject\Uuid;
use Aggrego\IntegrationClient\ValueObject\Version;
use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\IntegrationClient\Api\Server;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /** @var Server */
    private $server;

    /** @var Client */
    private $client;

    /**
     * @When I request client for :arg1 profile empty key
     */
    public function iRequestClientForProfileEmptyKey(string $profileName)
    {
        $this->client->handle(
            new Request(
                new Uuid('test'),
                new Key([]),
                new Profile(
                    new Name($profileName),
                    new Version('1.0')
                )
            )
        );
    }

    /**
     * @Then should response be digit
     */
    public function shouldResponseBeDigit()
    {
        /** @var \Aggrego\IntegrationClient\Response $item */
        $item = end($this->server->getList());
        $jsonData = $item->getData()->getValue();
        $data = json_decode($jsonData, true);
        Assertion::keyExists($data, 'value');
        Assertion::integer($data['value']);
    }

    /**
     * @beforeScenario
     */
    public function initialize(): void
    {
        $this->server = new Server();
        $this->client = new Client($this->server);
    }

}
