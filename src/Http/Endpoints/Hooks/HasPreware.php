<?php

namespace Essence\Http\Endpoints\Hooks;

use Essence\Http\Endpoints\Middleware\EssencePreware;

interface HasPreware extends HasHook
{
    /** @return EssencePreware[] */
    public function getPreware() : array;
}