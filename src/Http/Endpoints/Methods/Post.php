<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface Post extends RestVerb
{
    public function post(RequestInterface $request) : Response;
}