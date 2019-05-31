<?php

namespace Essence\Http\Endpoints\Methods;


use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface Delete extends RestVerb
{
    public function delete(RequestWrapper $request) : ResponseWrapper;
}