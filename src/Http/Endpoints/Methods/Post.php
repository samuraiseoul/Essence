<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface Post extends RestVerb
{
    public function post(Request $request) : Response;
}