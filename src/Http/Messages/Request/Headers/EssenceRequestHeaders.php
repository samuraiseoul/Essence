<?php


namespace Essence\Http\Messages\Request\Headers;


use Essence\Http\Messages\Header;

final class EssenceRequestHeaders implements RequestHeaders
{
    /** @var RequestHeader[] */
    private $headers;

    /** @param RequestHeader[] $headers */
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $headerName
     * @return RequestHeader
     */
    public function get(string $headerName): Header
    {
        return $this->headers[$headerName];
    }
}