<?php


namespace Essence\Http\Messages\Response;



use Essence\Http\Messages\Body;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\StartLine;

interface EssenceResponse
{
    public function setStartLine(StartLine $startLine) : void;

    public function setHeaders(Headers $headers) : void;

    public function setBody(Body $body) : void;
}

/*
    public function setProtocol(string $protocol): EssenceResponse;

    public function setStatusCode(int $statusCode): EssenceResponse;

    public function setStatusText(string $statusText): EssenceResponse;

    public function setHeaders(array $headers) : EssenceResponse;

    public function setBody(string $body) : EssenceResponse;

    public function toPsr7(): ResponseInterface;
}
*/