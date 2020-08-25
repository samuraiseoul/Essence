<?php


namespace Essence\Http\Messages\Headers;


final class EssenceHeaders implements EssenceHeadersInterface
{
    /** @var EssenceHeaderInterface[] */
    private array $headers;

    /** @param EssenceHeaderInterface[] $headers */
    public function __construct(array $headers)
    {
        $mappedHeaders = [];
        foreach ($headers as $header) {
            $mappedHeaders[$header->getHeaderName()] = $header;
        }
        $this->headers = $mappedHeaders;
    }

    public function get(string $headerName): EssenceHeaderInterface
    {
        return $this->headers[$headerName];
    }

    /**
     * @return EssenceHeaderInterface[]
     */
    public function all(): array
    {
        return $this->headers;
    }
}