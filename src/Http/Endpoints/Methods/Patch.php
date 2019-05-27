<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface Patch extends RestVerb
{
    public function patch(EssenceRequest $request) : EssenceResponse;
}