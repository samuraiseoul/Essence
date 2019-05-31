<?php


namespace Essence\Http\Messages\Response\StartLine;


final class EssenceResponseStartLine implements ResponseStartLine
{
    /** @var string */
    private $protocol;

    /** @var int */
    private $statusCode;

    /** @var string */
    private $statusText;

    public function __construct(string $protocol, int $statusCode, string $statusText)
    {
        $this->protocol = $protocol;
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }

    public function getProtocol(): string
    {
        return $this->protocol;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getStatusText(): string
    {
        return $this->statusText;
    }
}