<?php


namespace Essence\Http\Messages\Headers;


final class EssenceHeaders implements Headers
{
    /** @var Header[] */
    private $headers;

    /** @param Header[] $headers */
    public function __construct(array $headers)
    {
        $mappedHeaders = [];
        foreach ($headers as $header) {
            $mappedHeaders[$header->getHeaderName()] = $header;
        }
        $this->headers = $mappedHeaders;
    }

    /**
     * @param string $headerName
     * @return Header
     */
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