<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface Get extends RestVerb
{
    public function get(EssenceRequest $request) : EssenceResponse;
}