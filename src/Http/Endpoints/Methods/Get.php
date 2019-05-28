<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface Get extends RestVerb
{
    public function get(RequestInterface $request) : Response;
}