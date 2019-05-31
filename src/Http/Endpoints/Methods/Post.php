<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface Post extends RestVerb
{
    public function post(RequestWrapper $request) : ResponseWrapper;
}