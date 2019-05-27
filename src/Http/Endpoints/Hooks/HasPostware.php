<?php


namespace Essence\Http\Endpoints\Hooks;


use Essence\Http\Endpoints\Middleware\EssencePostware;

interface HasPostware extends HasHook
{
    /** @return EssencePostware[] */
    public function getPostware() : array;
}