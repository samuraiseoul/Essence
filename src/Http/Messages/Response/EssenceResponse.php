<?php


namespace Essence\Http\Messages\Response;

use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;
use Essence\Http\Messages\StartLine;

final class EssenceResponse implements Response
{
    /** @var ResponseStartLine */
    private $startLine;

    /** @var Headers */
    private $headers;

    /** @var Body */
    private $body;

    public function __construct(ResponseStartLine $startLine, Headers $headers, Body $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): StartLine
    {
        return $this->getResponseStartLine();
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function getResponseStartLine(): ResponseStartLine
    {
        return $this->startLine;
    }
}