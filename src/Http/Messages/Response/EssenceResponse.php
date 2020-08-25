<?php


namespace Essence\Http\Messages\Response;

use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLineInterface;
use Essence\Http\Messages\EssenceStartLineInterface;

final class EssenceResponse implements EssenceResponseInterface
{
    private EssenceResponseStartLineInterface $startLine;

    private EssenceHeadersInterface $headers;

    private EssenceBodyInterface $body;

    public function __construct(EssenceResponseStartLineInterface $startLine, EssenceHeadersInterface $headers, EssenceBodyInterface $body)
    {
        $this->startLine = $startLine;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStartLine(): EssenceStartLineInterface
    {
        return $this->getResponseStartLine();
    }

    public function getHeaders(): EssenceHeadersInterface
    {
        return $this->headers;
    }

    public function getBody(): EssenceBodyInterface
    {
        return $this->body;
    }

    public function getResponseStartLine(): EssenceResponseStartLineInterface
    {
        return $this->startLine;
    }
}