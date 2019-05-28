<?php


namespace Essence\Http\Messages\Request\Headers\Factories;


use BadMethodCallException;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\Request\Headers\EssenceRequestHeader;
use Essence\Http\Messages\Request\Headers\EssenceRequestHeaders;

final class EssenceRequestHeadersFactory implements RequestHeadersFactory
{
    /** @var EssenceRequestHeaders */
    private $headers;

    public function getHeaders(): Headers
    {
        return $this->headers ?? $this->headers = $this->createEssenceRequestHeaders();
    }

    private function getRequestHeaders() : array {
        $headers = [];
        foreach(getallheaders() as $headerKey => $headerValue) {
            $headers[] = new EssenceRequestHeader($headerKey, $headerValue);
        }
        return $headers;
    }

    private function createEssenceRequestHeaders(): EssenceRequestHeaders
    {
        if($this->headers) {
            throw new BadMethodCallException("Headers already instantiated!");
        }
        return new EssenceRequestHeaders($this->getRequestHeaders());
    }
}