<?php

namespace Essence\Http\Endpoints\Hooks;

use Essence\Http\Endpoints\Middleware\Preware;

interface HasPreware extends HasHook
{
    /** @return Preware[] */
    public function getPreware() : array;
}