<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface Delete extends RestVerb
{
    public function delete(EssenceRequest $request) : EssenceResponse;
}