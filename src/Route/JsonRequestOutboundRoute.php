<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest\Route;

use DigitalMarketingFramework\Core\SchemaDocument\Schema\ContainerSchema;
use DigitalMarketingFramework\Core\SchemaDocument\Schema\SchemaInterface;
use DigitalMarketingFramework\Core\SchemaDocument\Schema\StringSchema;
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

    public static function getSchema(): SchemaInterface
    {
        /** @var ContainerSchema $schema */
        $schema = parent::getSchema();

        // JSON structure is inherently nested, so the multi-value format option is not applicable
        $schema->removeProperty(static::KEY_MULTI_VALUE_FORMAT);

        // GET requests don't support a JSON body — remove GET from the method dropdown
        /** @var StringSchema $methodSchema */
        $methodSchema = $schema->getProperty(static::KEY_METHOD)->getSchema();
        $methodSchema->getAllowedValues()->reset();
        $methodSchema->getAllowedValues()->addValue('POST');
        $methodSchema->getAllowedValues()->addValue('PUT');
        $methodSchema->getAllowedValues()->addValue('DELETE');

        return $schema;
    }
}
