<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface Put extends RestVerb
{
    public function put(EssenceRequestInterface $request) : EssenceResponse;
}