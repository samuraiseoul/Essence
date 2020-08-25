<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\EssenceHeadersInterface;

final class EssenceHtmlResponseWrapper implements EssenceResponseWrapperInterface
{
    private ?EssenceHeadersInterface $headers;

    private string $htmlBody;

    public function __construct(string $htmlBody, EssenceHeadersInterface $headers = null)
    {
        $this->headers = $headers;
        $this->htmlBody = $htmlBody;
        //TODO: Validate body and add appropriate headers in;
    }

    public function getHeaders(): ?EssenceHeadersInterface
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->htmlBody;
    }
}