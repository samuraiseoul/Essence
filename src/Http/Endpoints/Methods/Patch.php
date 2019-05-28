<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface Patch extends RestVerb
{
    public function patch(RequestInterface $request) : Response;
}