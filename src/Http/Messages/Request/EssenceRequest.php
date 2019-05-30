<?php

namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Request\Body\RequestBody;
use Essence\Http\Messages\Request\Headers\RequestHeaders;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;

final class EssenceRequest implements Request
{
    /** @var RequestStartLine */
    private $startLine;

    /** @var RequestHeaders */
    private $headers;

    /** @var RequestBody */
    private $body;

    public function __construct(RequestStartLine $startLine, RequestHeaders $headers, RequestBody $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): RequestStartLine
    {
        return $this->startLine;
    }

    public function getHeaders(): RequestHeaders
    {
        return $this->headers;
    }

    public function getBody(): RequestBody
    {
        return $this->body;
    }
}