<?php

namespace DigitalMarketingFramework\Distributor\JsonRequest\DataDispatcher;

use DigitalMarketingFramework\Core\Model\Data\Value\ValueInterface;
use DigitalMarketingFramework\Distributor\Request\DataDispatcher\RequestDataDispatcher;

class JsonRequestDataDispatcher extends RequestDataDispatcher
{
    protected function getDefaultHeaders(): array
    {
        $headers = parent::getDefaultHeaders();
        $headers['Content-Type'] = 'application/json';
        return $headers;
    }

    /**
     * @param array<string,string|ValueInterface>
     * @return array<string,mixed>
     */
    protected function computeValueArray(array $data): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = (int) $key;
            }
            $result[$key] = $value instanceof ValueInterface ? $value->getValue() : $value;
        }
        return $result;
    }

    /**
     * @param array<string,string|ValueInterface>
     */
    protected function buildBody(array $data): string
    {
        return json_encode($this->computeValueArray($data), JSON_PRETTY_PRINT);
    }
}
