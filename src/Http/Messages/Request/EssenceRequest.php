<?php

namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Body;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

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

    public function getStartLine(): RequestStartLine
    {
        return $this->startLine;
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function toPsr7(): PsrRequestInterface {
        return new class() implements PsrRequestInterface {
            public function getProtocolVersion() {}
            public function withProtocolVersion($version) {}
            public function getHeaders() {}
            public function hasHeader($name) {}
            public function getHeader($name) {}
            public function getHeaderLine($name) {}
            public function withHeader($name, $value) {}
            public function withAddedHeader($name, $value) {}
            public function withoutHeader($name) {}
            public function getBody() {}
            public function withBody(StreamInterface $body) {}
            public function getRequestTarget() {}
            public function withRequestTarget($requestTarget) {}
            public function getMethod() {}
            public function withMethod($method) {}
            public function getUri() {}
            public function withUri(UriInterface $uri, $preserveHost = false) {}
        };
    }
}