<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Body\EssenceSingleResourceResponseBody;
use Essence\Http\Messages\Headers\EssenceHeaders;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLine;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLineInterface;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

final class EssenceResponseFactory implements EssenceResponseFactoryInterface
{
    public function fromResponseWrapper(EssenceResponseWrapperInterface $responseWrapper): EssenceResponseInterface
    {
        return new EssenceResponse(
            $this->getStartLine($responseWrapper),
            $this->getHeaders($responseWrapper),
            $this->getBody($responseWrapper)
        );
    }

    private function getStartLine(EssenceResponseWrapperInterface $responseWrapper) : EssenceResponseStartLineInterface {
        return new EssenceResponseStartLine('HTTP/1.1', 200, 'OK');
    }

    private function getHeaders(EssenceResponseWrapperInterface $responseWrapper) : EssenceHeadersInterface {
        $headers = [

        ];
        if($responseWrapper->getHeaders()) {
            foreach ($responseWrapper->getHeaders()->all() as $header) {
                $headers[] = $header;
            }
        }
        return new EssenceHeaders($headers);
    }

    private function getBody(EssenceResponseWrapperInterface $responseWrapper) : EssenceBodyInterface {
        return new EssenceSingleResourceResponseBody($responseWrapper->getContents());
    }
}