<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\Headers;

final class EssenceHtmlResponseWrapper implements ResponseWrapper
{
    private ?Headers $headers;

    private string $htmlBody;

    public function __construct(string $htmlBody, Headers $headers = null)
    {
        $this->headers = $headers;
        $this->htmlBody = $htmlBody;
        //TODO: Validate body and add appropriate headers in;
    }

    public function getHeaders(): ?Headers
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->htmlBody;
    }
}