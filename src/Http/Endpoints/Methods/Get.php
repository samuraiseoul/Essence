<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface Get extends RestVerb
{
    public function get(RequestWrapper $request) : ResponseWrapper;
}