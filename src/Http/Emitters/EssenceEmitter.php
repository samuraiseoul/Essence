<?php


namespace Essence\Http\Emitters;


use Essence\Http\Messages\Body\EssenceSingleResourceRequestBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeaderInterface;
use Essence\Http\Messages\Response\EssenceResponseInterface;

final class EssenceEmitter implements EssenceEmitterInterface
{
    public function emitResponse(EssenceResponseInterface $response) : void
    {
        $this->emitStartLine($response);
        $this->emitHeaders($response);
        $this->emitBody($response);
        exit(0);
    }

    private function emitStartLine(EssenceResponseInterface $response): void
    {
        $startLine = $response->getResponseStartLine();
        header("{$startLine->getProtocol()} {$startLine->getStatusCode()} {$startLine->getStatusText()}");
    }

    private function emitHeaders(EssenceResponseInterface $response): void
    {
        /** @var EssenceHeaderInterface $header */
        foreach ($response->getHeaders() as $header) {
            header("{$header->getHeaderName()}: {$header->getHeaderValue()}");
        }
    }

    private function emitBody(EssenceResponseInterface $response): void
    {
        /** @var EssenceSingleResourceRequestBodyInterface $body */
        $body = $response->getBody();
        echo $body->getContents();
    }
}