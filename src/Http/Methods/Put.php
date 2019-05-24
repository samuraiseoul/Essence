<?php

namespace Essence\Http\Methods;

use Essence\Request\MethodRequests\PutRequest;
use Essence\Response\BaseResponse;

interface Put extends RestVerb
{
    public function put(PutRequest $request) : BaseResponse;
}