<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface Get extends RestVerb
{
    public function get(EssenceRequestInterface $request) : EssenceResponse;
}