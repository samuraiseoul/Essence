<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\Headers;

final class EssenceFileResponseWrapper implements ResponseWrapper
{
    private ?Headers $headers;

    private string $fileBody;

    public function __construct(string $fileBody, ?Headers $headers = null)
    {
        $this->headers = $headers;
        $this->fileBody = $fileBody;
        //TODO: Validate body and add appropriate headers in;
    }

    public function getHeaders(): ?Headers
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->fileBody;
    }
}