<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface Post extends RestVerb
{
    public function post(EssenceRequestInterface $request) : EssenceResponse;
}