<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest;

use DigitalMarketingFramework\Core\PluginInitialization;
use DigitalMarketingFramework\Distributor\Core\DataDispatcher\DataDispatcherInterface;
use DigitalMarketingFramework\Distributor\Core\Route\RouteInterface;
use DigitalMarketingFramework\Distributor\JsonRequest\Route\JsonRequestRoute;
use DigitalMarketingFramework\Distributor\JsonRequest\DataDispatcher\JsonRequestDataDispatcher;

class DistributorPluginInitialization extends PluginInitialization
{
    protected const PLUGINS = [
        DataDispatcherInterface::class => [
            JsonRequestDataDispatcher::class,
        ],
        RouteInterface::class => [
            JsonRequestRoute::class,
        ],
    ];
}
