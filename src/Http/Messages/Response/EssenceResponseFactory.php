<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Body\EssenceSingleResourceResponseBody;
use Essence\Http\Messages\Headers\EssenceHeaders;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLine;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

final class EssenceResponseFactory implements ResponseFactory
{
    public function fromResponseWrapper(ResponseWrapper $responseWrapper): Response
    {
        return new EssenceResponse(
            $this->getStartLine($responseWrapper),
            $this->getHeaders($responseWrapper),
            $this->getBody($responseWrapper)
        );
    }

    private function getStartLine(ResponseWrapper $responseWrapper) : EssenceResponseStartLine {
        return new EssenceResponseStartLine('HTTP/1.1', 200, 'OK');
    }

    private function getHeaders(ResponseWrapper $responseWrapper) : Headers {
        $headers = [

        ];
        if($responseWrapper->getHeaders()) {
            foreach ($responseWrapper->getHeaders()->all() as $header) {
                $headers[] = $header;
            }
        }
        return new EssenceHeaders($headers);
    }

    private function getBody(ResponseWrapper $responseWrapper) : Body {
        return new EssenceSingleResourceResponseBody($responseWrapper->getContents());
    }
}