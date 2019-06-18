<?php

namespace Essence;

use BadMethodCallException;
use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Endpoints\EndpointHandler;
use Essence\Http\Endpoints\EssenceEndpointHandler;
use Essence\Http\Messages\Request\Factories\Body\EssenceRequestBodyFactory;
use Essence\Http\Messages\Request\Factories\Headers\EssenceRequestHeadersFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssencePathParameterFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceQueryParameterFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceRequestStartLineFactory;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceRequestTargetFactory;
use Essence\Http\Messages\Request\Factory\EssenceRequestFactory;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\Validator\EssenceRequestEndpointValidator;
use Essence\Http\Messages\Response\Emitters\Emitter;
use Essence\Http\Messages\Response\Emitters\EssenceEmitter;

final class Essence
{
    public function __construct()
    {
        throw new BadMethodCallException('Essence should never be instantiated.');
    }

    public static function define(Endpoint $endpoint): void
    {
        $request = self::prepareRequest();
        $handler = self::prepareEndpointHandler();
        $emitter = self::prepareEmitter();
        $emitter->emitResponse($handler->handleEndpoint($request, $endpoint));
    }

    private static function prepareRequest() : Request
    {
        $queryParametersFactory = new EssenceQueryParameterFactory();
        $pathParametersFactory = new EssencePathParameterFactory();
        $headersFactory = new EssenceRequestHeadersFactory();
        $bodyFactory = new EssenceRequestBodyFactory();
        $requestTargetFactory = new EssenceRequestTargetFactory($queryParametersFactory, $pathParametersFactory);
        $startLineFactory = new EssenceRequestStartLineFactory($requestTargetFactory);
        $requestFactory = new EssenceRequestFactory($startLineFactory, $headersFactory, $bodyFactory);
        return $requestFactory->getRequest();
    }

    private static function prepareEndpointHandler() : EndpointHandler
    {
        $requestEndpointValidator = new EssenceRequestEndpointValidator();
        return new EssenceEndpointHandler($requestEndpointValidator);
    }

    private static function prepareEmitter() : Emitter {
        return new EssenceEmitter();
    }
}