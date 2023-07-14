<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest\Route;

use DigitalMarketingFramework\Distributor\Request\Route\RequestRoute;

class JsonRequestRoute extends RequestRoute
{
    protected function getDispatcherKeyword(): string
    {
        return 'jsonRequest';
    }
}
