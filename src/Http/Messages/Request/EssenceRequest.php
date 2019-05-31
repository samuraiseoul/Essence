<?php

namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Essence\Http\Messages\StartLine;

final class EssenceRequest implements Request
{
    /** @var RequestStartLine */
    private $startLine;

    /** @var Headers */
    private $headers;

    /** @var Body */
    private $body;

    public function __construct(RequestStartLine $startLine, Headers $headers, Body $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): StartLine
    {
        return $this->getRequestStartLine();
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function getRequestStartLine(): RequestStartLine
    {
        return $this->startLine;
    }
}