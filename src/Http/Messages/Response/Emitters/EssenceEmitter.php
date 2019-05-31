<?php


namespace Essence\Http\Messages\Response\Emitters;


use Essence\Http\Messages\Body\EssenceSingleResourceBody;
use Essence\Http\Messages\Headers\Header;
use Essence\Http\Messages\Response\Response;

final class EssenceEmitter implements Emitter
{
    public function emitResponse(Response $response) : void
    {
        $this->emitStartLine($response);
        $this->emitHeaders($response);
        $this->emitBody($response);
        exit(0);
    }

    private function emitStartLine(Response $response): void
    {
        $startLine = $response->getResponseStartLine();
        header("{$startLine->getProtocol()} {$startLine->getStatusCode()} {$startLine->getStatusText()}");
    }

    private function emitHeaders(Response $response): void
    {
        /** @var Header $header */
        foreach ($response->getHeaders() as $header) {
            header("{$header->getHeaderName()}: {$header->getHeaderValue()}");
        }
    }

    private function emitBody(Response $response): void
    {
        /** @var EssenceSingleResourceBody $body */
        $body = $response->getBody();
        echo $body->getContents();
    }
}