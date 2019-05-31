<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface Put extends RestVerb
{
    public function put(RequestWrapper $request) : ResponseWrapper;
}