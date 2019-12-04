<?php

namespace Essence;

use BadMethodCallException;
use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Messages\Request\Factories\Body\EssenceRequestBodyFactory;
use Essence\Http\Messages\Request\Factories\Headers\EssenceRequestHeadersFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceQueryParameterFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceRequestStartLineFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceRequestTargetFactory;
use Essence\Http\Messages\Request\Factory\EssenceRequestFactory;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapper;
use Essence\Http\Messages\Response\Emitters\Emitter;
use Essence\Http\Messages\Response\Emitters\EssenceEmitter;
use Essence\Http\Messages\Response\EssenceResponseFactory;
use Essence\Http\Messages\Response\Response;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

final class Essence
{
    public function __construct()
    {
        throw new BadMethodCallException('Essence should never be instantiated.');
    }

    public static function define(Endpoint $endpoint): void
    {
        $request = self::prepareRequest();
        $emitter = self::prepareEmitter();
        $responseWrapper = self::handleEndpoint($request, $endpoint);
        $response = self::prepareResponse($responseWrapper);
        $emitter->emitResponse($response);
    }

    private static function prepareResponse(ResponseWrapper $responseWrapper) : Response {
        $responseFactory = new EssenceResponseFactory();
        return $responseFactory->fromResponseWrapper($responseWrapper);
    }

    private static function prepareRequest() : Request
    {
        $queryParametersFactory = new EssenceQueryParameterFactory();
        $headersFactory = new EssenceRequestHeadersFactory();
        $bodyFactory = new EssenceRequestBodyFactory();
        $requestTargetFactory = new EssenceRequestTargetFactory($queryParametersFactory);
        $startLineFactory = new EssenceRequestStartLineFactory($requestTargetFactory);
        $requestFactory = new EssenceRequestFactory($startLineFactory, $headersFactory, $bodyFactory);
        return $requestFactory->getRequest();
    }

    private static function prepareEmitter() : Emitter {
        return new EssenceEmitter();
    }

    private static function handleEndpoint(Request $request, Endpoint $endpoint) : ResponseWrapper {
        $methodName = strtolower($request->getRequestStartLine()->getHTTPMethod());
        return $endpoint->{$methodName}(new EssenceRequestWrapper($request));
    }
}