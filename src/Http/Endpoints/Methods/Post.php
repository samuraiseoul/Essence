<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface Post extends RestVerb
{
    public function post(EssenceRequest $request) : EssenceResponse;
}