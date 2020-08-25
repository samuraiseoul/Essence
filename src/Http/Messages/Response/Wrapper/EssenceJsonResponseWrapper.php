<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\EssenceHeadersInterface;

final class EssenceJsonResponseWrapper implements EssenceResponseWrapperInterface
{
    private ?EssenceHeadersInterface $headers;

    private string $jsonBody;

    public function __construct(string $jsonBody, ?EssenceHeadersInterface $headers = null)
    {
        $this->headers = $headers;
        $this->jsonBody = $jsonBody;
        //TODO: Validate body and add appropriate headers in;
    }


    public function getHeaders(): ?EssenceHeadersInterface
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->jsonBody;
    }
}