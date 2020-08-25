<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapperInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface Post extends RestVerb
{
    public function post(EssenceRequestWrapperInterface $request) : EssenceResponseWrapperInterface;
}