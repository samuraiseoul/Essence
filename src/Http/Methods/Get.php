<?php

namespace Essence\Http\Methods;

use Essence\Request\MethodRequests\GetRequest;
use Essence\Response\BaseResponse;

interface Get extends RestVerb
{
    public function get(GetRequest $request) : BaseResponse;
}