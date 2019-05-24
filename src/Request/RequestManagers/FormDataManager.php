<?php

namespace Essence\Request\RequestManagers;


use Essence\Utilities\MapManager;

final class FormDataManager extends MapManager
{
    protected function prepareMapFunction(): array
    {
        return $_POST;
    }
}