<?php

namespace Essence\Http;

use Essence\Http\Hooks\HasPostware;
use Essence\Http\Hooks\HasPreware;
use Essence\Request\MethodRequests\RestRequest;
use Essence\Response\BaseResponse;

abstract class Endpoint
{
    final public function callPreware(RestRequest $request) : void
    {
        if($this instanceof HasPreware) {
            /** @var Preware $preware */
            foreach($this->getPreware() as $preware) {
                $preware->handle($request);
            }
        }
    }

    final public function callPostware(BaseResponse $response) : void
    {
        if($this instanceof HasPostware) {
            /** @var Postware $postware */
            foreach($this->getPostware() as $postware) {
                $postware->handle($response);
            }
        }
    }
}