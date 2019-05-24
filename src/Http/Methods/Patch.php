<?php

namespace Essence\Http\Methods;

use Essence\Request\MethodRequests\PatchRequest;
use Essence\Response\BaseResponse;

interface Patch extends RestVerb
{
    public function patch(PatchRequest $request) : BaseResponse;
}