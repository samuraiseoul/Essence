<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\Headers;

final class EssenceJsonResponseWrapper implements ResponseWrapper
{
    private ?Headers $headers;

    private string $jsonBody;

    public function __construct(string $jsonBody, ?Headers $headers = null)
    {
        $this->headers = $headers;
        $this->jsonBody = $jsonBody;
        //TODO: Validate body and add appropriate headers in;
    }


    public function getHeaders(): ?Headers
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->jsonBody;
    }
}