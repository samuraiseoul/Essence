<?php


namespace Essence\Response;


final class JsonResponse extends BaseResponse
{

    public function renderBody(): string
    {
        return json_encode($this->body);
    }
}