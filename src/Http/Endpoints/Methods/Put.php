<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface Put extends RestVerb
{
    public function put(RequestInterface $request) : Response;
}