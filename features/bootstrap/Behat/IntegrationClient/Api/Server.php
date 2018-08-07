<?php

declare(strict_types = 1);

namespace Behat\IntegrationClient\Api;

use Aggrego\IntegrationClient\Api\Server as AggregoServer;
use Aggrego\IntegrationClient\Response;

class Server implements AggregoServer
{
    /** @var array Response[] */
    private $list = [];

    public function __construct()
    {
        $this->initialize();
    }

    public function push(Response $response): void
    {
        $this->list[] = $response;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function initialize(): void
    {
        $this->list = [];
    }
}
