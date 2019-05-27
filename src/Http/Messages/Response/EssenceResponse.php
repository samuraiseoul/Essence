<?php


namespace Essence\Http\Messages\Response;


use Psr\Http\Message\ResponseInterface;

interface EssenceResponse
{
    public function setProtocol(string $protocol): EssenceResponse;

    public function setStatusCode(int $statusCode): EssenceResponse;

    public function setStatusText(string $statusText): EssenceResponse;

    public function setHeaders(array $headers) : EssenceResponse;

    public function setBody(string $body) : EssenceResponse;

    public function toPsr7(): ResponseInterface;
}