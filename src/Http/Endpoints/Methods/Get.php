<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapperInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface Get extends RestVerb
{
    public function get(EssenceRequestWrapperInterface $request) : EssenceResponseWrapperInterface;
}