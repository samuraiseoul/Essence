<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface Delete extends RestVerb
{
    public function delete(RequestInterface $request) : Response;
}