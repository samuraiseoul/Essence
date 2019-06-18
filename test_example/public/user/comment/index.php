<?php

use Essence\Essence;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;


Essence::define(new class() implements Get {
    public function get(RequestWrapper $request): ResponseWrapper
    {
        $responseWrapper = new EssenceResponseWrapper();
        $responseWrapper->setRawBody("
            <html>
                <head><title>Essence Title</title></head>
                <body>
                    <h1>Essence Header!</h1>
                    <p>
                        User Id: {$request->getPathParameter('userId')} <br>
                        Comment Id: {$request->getPathParameter('commentId')} <br>
                        Sort Query String: {$request->queryParameterAsString('sort')} <br>
                    </p>
                </body>
            </html>
        ");
        return $responseWrapper;
    }
});
