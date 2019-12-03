<?php


namespace Essence\Http\Messages\Headers;


final class EssenceHeaders implements Headers
{
    /** @var Header[] */
    private array $headers;

    /** @param Header[] $headers */
    public function __construct(array $headers)
    {
        $mappedHeaders = [];
        foreach ($headers as $header) {
            $mappedHeaders[$header->getHeaderName()] = $header;
        }
        $this->headers = $mappedHeaders;
    }

    public function get(string $headerName): Header
    {
        return $this->headers[$headerName];
    }

    /**
     * @return Header[]
     */
    public function all(): array
    {
        return $this->headers;
    }
}