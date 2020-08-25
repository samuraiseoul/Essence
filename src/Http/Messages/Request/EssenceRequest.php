<?php

namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLineInterface;
use Essence\Http\Messages\EssenceStartLineInterface;

final class EssenceRequest implements EssenceRequestInterface
{
    private EssenceRequestStartLineInterface $startLine;

    private EssenceHeadersInterface $headers;

    private EssenceBodyInterface $body;

    public function __construct(EssenceRequestStartLineInterface $startLine, EssenceHeadersInterface $headers, EssenceBodyInterface $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): EssenceStartLineInterface
    {
        return $this->getRequestStartLine();
    }

    public function getHeaders(): EssenceHeadersInterface
    {
        return $this->headers;
    }

    public function getBody(): EssenceBodyInterface
    {
        return $this->body;
    }

    public function getRequestStartLine(): EssenceRequestStartLineInterface
    {
        return $this->startLine;
    }
}