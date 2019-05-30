<?php


namespace Http\Messages\Response;


use Essence\Http\Messages\Response\Body\ResponseBody;
use Essence\Http\Messages\Response\Headers\ResponseHeaders;
use Essence\Http\Messages\Response\Response;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;

final class EssenceResponse implements Response
{
    /** @var ResponseStartLine */
    private $startLine;

    /** @var ResponseHeaders */
    private $headers;

    /** @var ResponseBody */
    private $body;

    public function __construct(ResponseStartLine $startLine, ResponseHeaders $headers, ResponseBody $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): ResponseStartLine
    {
        return $this->startLine;
    }

    public function getHeaders(): ResponseHeaders
    {
        return $this->headers;
    }

    public function getBody(): ResponseBody
    {
        return $this->body;
    }
}