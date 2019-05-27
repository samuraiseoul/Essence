<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface Patch extends RestVerb
{
    public function patch(EssenceRequestInterface $request) : EssenceResponse;
}