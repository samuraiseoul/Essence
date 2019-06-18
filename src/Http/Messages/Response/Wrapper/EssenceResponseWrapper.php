<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Body\EssenceSingleResourceBody;
use Essence\Http\Messages\Headers\EssenceHeaders;
use Essence\Http\Messages\Headers\Header;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Response\EssenceResponse;
use Essence\Http\Messages\Response\Response;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLine;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;
use JsonSerializable;

final class EssenceResponseWrapper implements ResponseWrapper
{
    /** @var ResponseStartLine */
    private $startLine;

    /** @var Headers */
    private $headers;

    /** @var Body */
    private $body;

    public function __construct(ResponseStartLine $startLine = null, Headers $headers = null, Body $body = null)
    {
        $this->startLine = $startLine ?? new EssenceResponseStartLine('Http/1.1', 200, 'OK');
        $this->headers = $headers ?? new EssenceHeaders([]);
        $this->body = $body ?? new EssenceSingleResourceBody('');
    }

    public function addHeader(Header $header): ResponseWrapper
    {
        $headers = $this->headers->all();
        $headers[] = $header;
        $this->headers = new EssenceHeaders($headers);
        return $this;
    }

    public function setStatusCode(int $statusCode): ResponseWrapper
    {
        $this->startLine = new EssenceResponseStartLine('Http/1.1', $statusCode, 'OK');
        return $this;
    }

    public function setJsonBody(JsonSerializable $json): ResponseWrapper
    {
        $this->body = new EssenceSingleResourceBody(json_encode($json));
        return $this;
    }

    public function setRawBody(string $body): ResponseWrapper
    {
        $this->body = new EssenceSingleResourceBody($body);
        return $this;
    }

    public function setFileBody(string $filepath): ResponseWrapper
    {
        $this->body = new EssenceSingleResourceBody(file_get_contents($filepath));
        return $this;
    }

    public function setXmlBody(string $xml): ResponseWrapper
    {
        $this->body = new EssenceSingleResourceBody($xml);
        return $this;
    }

    public function setHtmlBody(string $html): ResponseWrapper
    {
        $this->body = new EssenceSingleResourceBody($html);
        return $this;
    }

    public function getResponse(): Response
    {
        return new EssenceResponse($this->startLine, $this->headers, $this->body);
    }
}