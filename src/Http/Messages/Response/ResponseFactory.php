<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

interface ResponseFactory
{
    public function fromResponseWrapper(ResponseWrapper $responseWrapper) : Response;
}