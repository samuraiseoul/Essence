<?php

namespace Essence\Http\Endpoints\Methods;


use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapperInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface Delete extends RestVerb
{
    public function delete(EssenceRequestWrapperInterface $request) : EssenceResponseWrapperInterface;
}