<?php

namespace Essence\Http\Endpoints\Methods;


use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapperInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface Patch extends RestVerb
{
    public function patch(EssenceRequestWrapperInterface $request) : EssenceResponseWrapperInterface;
}