<?php


namespace Essence\Http\Endpoints\Hooks;


use Essence\Http\Endpoints\Middleware\Postware;

interface HasPostware extends HasHook
{
    /** @return Postware[] */
    public function getPostware() : array;
}