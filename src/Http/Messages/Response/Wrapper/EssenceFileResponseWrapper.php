<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\EssenceHeadersInterface;

final class EssenceFileResponseWrapper implements EssenceResponseWrapperInterface
{
    private ?EssenceHeadersInterface $headers;

    private string $fileBody;

    public function __construct(string $fileBody, ?EssenceHeadersInterface $headers = null)
    {
        $this->headers = $headers;
        $this->fileBody = $fileBody;
        //TODO: Validate body and add appropriate headers in;
    }

    public function getHeaders(): ?EssenceHeadersInterface
    {
        return $this->headers;
    }

    public function getContents(): string
    {
        return $this->fileBody;
    }
}