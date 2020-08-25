<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapperInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface Put extends RestVerb
{
    public function put(EssenceRequestWrapperInterface $request) : EssenceResponseWrapperInterface;
}