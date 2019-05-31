<?php

namespace Essence\Http\Endpoints\Methods;


use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface Patch extends RestVerb
{
    public function patch(RequestWrapper $request) : ResponseWrapper;
}