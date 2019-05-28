<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface Get extends RestVerb
{
    public function get(Request $request) : Response;
}