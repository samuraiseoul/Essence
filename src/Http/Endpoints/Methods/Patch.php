<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface Patch extends RestVerb
{
    public function patch(Request $request) : Response;
}