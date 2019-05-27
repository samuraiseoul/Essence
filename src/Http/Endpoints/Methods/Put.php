<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface Put extends RestVerb
{
    public function put(EssenceRequest $request) : EssenceResponse;
}