<?php


namespace Essence\Http\Messages\Request\Factories\Headers;


use BadMethodCallException;
use Essence\Http\Messages\Headers\EssenceHeader;
use Essence\Http\Messages\Headers\EssenceHeaders;
use Essence\Http\Messages\Headers\Headers;

final class EssenceRequestHeadersFactory implements RequestHeadersFactory
{
    private ?Headers $headers = null;

    public function getHeaders(): Headers
    {
        return $this->headers ?? $this->headers = $this->createEssenceRequestHeaders();
    }

    private function getRequestHeaders() : array {
        $headers = [];
        foreach(getallheaders() as $headerKey => $headerValue) {
            $headers[] = new EssenceHeader($headerKey, $headerValue);
        }
        return $headers;
    }

    private function createEssenceRequestHeaders(): Headers
    {
        if($this->headers) {
            throw new BadMethodCallException('Headers already instantiated!');
        }
        return new EssenceHeaders($this->getRequestHeaders());
    }
}