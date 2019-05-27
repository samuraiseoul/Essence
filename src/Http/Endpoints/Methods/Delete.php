<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface Delete extends RestVerb
{
    public function delete(EssenceRequestInterface $request) : EssenceResponse;
}