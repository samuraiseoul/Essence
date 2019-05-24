<?php

namespace Essence\Http\Methods;

use Essence\Request\MethodRequests\PostRequest;
use Essence\Response\BaseResponse;

interface Post extends RestVerb
{
    public function post(PostRequest $request) : BaseResponse;
}