<?php


namespace Essence\Http\Messages\Request\StartLine;


use Essence\Helpers\Rest\RestConstants;
use InvalidArgumentException;

final class EssenceRequestStartLine implements EssenceRequestStartLineInterface
{
    private string $httpMethod;

    private EssenceRequestTargetInterface $requestTarget;

    private string $httpVersion;

    public function __construct(string $httpMethod, EssenceRequestTargetInterface $requestTarget, string $httpVersion)
    {
        $this->validateHttpMethod($httpMethod);
        $this->httpMethod = $httpMethod;
        $this->requestTarget = $requestTarget;
        $this->httpVersion = $httpVersion;
    }

    public function getHTTPMethod(): string
    {
        return $this->httpMethod;
    }

    public function getRequestTarget(): EssenceRequestTargetInterface
    {
        return $this->requestTarget;
    }

    public function getHTTPVersion(): string
    {
        return $this->httpVersion;
    }

    private function validateHttpMethod(string $httpMethod): void
    {
        if (!in_array($httpMethod, RestConstants::VERBS, true)) {
            throw new InvalidArgumentException("Supplied HTTP Verb, $httpMethod, not a valid HTTP verb!");
        }
    }
}