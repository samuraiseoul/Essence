<?php


namespace Essence\Http\Messages\Response\Wrapper;



use Essence\Http\Messages\Headers\Header;
use Essence\Http\Messages\Response\Response;

interface ResponseWrapper
{
    public function addHeader(Header $header) : ResponseWrapper;

    public function setStatusCode(int $statusCode) : ResponseWrapper;

    public function setJsonBody(\JsonSerializable $json) : ResponseWrapper;

    public function setRawBody(string $body) : ResponseWrapper;

    public function setFileBody(string $filepath) : ResponseWrapper;

    public function setXmlBody(string $xml) : ResponseWrapper;

    public function setHtmlBody(string $html) : ResponseWrapper;

    public function getResponse() : Response;
}