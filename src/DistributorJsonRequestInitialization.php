<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest;

use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Registry\RegistryDomain;
use DigitalMarketingFramework\Distributor\Core\DataDispatcher\DataDispatcherInterface;
use DigitalMarketingFramework\Distributor\Core\Route\OutboundRouteInterface;
use DigitalMarketingFramework\Distributor\JsonRequest\DataDispatcher\JsonRequestDataDispatcher;
use DigitalMarketingFramework\Distributor\JsonRequest\Route\JsonRequestOutboundRoute;

class DistributorJsonRequestInitialization extends Initialization
{
    protected const PLUGINS = [
        RegistryDomain::DISTRIBUTOR => [
            DataDispatcherInterface::class => [
                JsonRequestDataDispatcher::class,
            ],
            OutboundRouteInterface::class => [
                JsonRequestOutboundRoute::class,
            ],
        ],
    ];

    protected const SCHEMA_MIGRATIONS = [];

    public function __construct(string $packageAlias = '')
    {
        parent::__construct('distributor-json-request', '1.0.0', $packageAlias);
    }
}
