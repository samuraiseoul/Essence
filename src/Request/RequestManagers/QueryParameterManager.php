<?php

namespace Essence\Request\RequestManagers;


use Essence\Utilities\MapManager;

final class QueryParameterManager extends MapManager
{
    protected function prepareMapFunction(): array
    {
        return $_GET;
    }
}