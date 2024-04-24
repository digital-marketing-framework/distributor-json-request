<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest\Route;

use DigitalMarketingFramework\Distributor\Request\Route\RequestOutboundRoute;

class JsonRequestOutboundRoute extends RequestOutboundRoute
{
    public static function getLabel(): ?string
    {
        return 'HTTP Request (JSON)';
    }

    protected function getDispatcherKeyword(): string
    {
        return 'jsonRequest';
    }
}
