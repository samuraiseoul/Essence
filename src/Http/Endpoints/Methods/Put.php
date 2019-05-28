<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface Put extends RestVerb
{
    public function put(Request $request) : Response;
}