<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface Delete extends RestVerb
{
    public function delete(Request $request) : Response;
}