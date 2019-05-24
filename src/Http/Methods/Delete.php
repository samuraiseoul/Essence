<?php

namespace Essence\Http\Methods;

use Essence\Request\MethodRequests\DeleteRequest;
use Essence\Response\BaseResponse;

interface Delete extends RestVerb
{
    public function delete(DeleteRequest $request) : BaseResponse;
}