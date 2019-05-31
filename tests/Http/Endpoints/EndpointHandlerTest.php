<?php

namespace Essence\Tests\Http;

use Essence\Http\Endpoints\EssenceEndpointHandler;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Essence\Http\Messages\Request\Validator\RequestEndpointValidator;
use Essence\Http\Messages\Response\Response;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EndpointHandlerTest extends TestCase
{
    public function testRequestValidated() : void {
        $mockEssenceRequest = $this->createRequestMock();
        $mockEssenceResponse = $this->createResponseMock();
        $mockEssenceResponseWrapper = $this->createResponseWrapperMock($mockEssenceResponse);
        $mockGetEndpoint = $this->createEndpointMock($mockEssenceResponseWrapper);
        $mockRequestValidator = $this->createValidatorMock();

        $endpointHandler = new EssenceEndpointHandler($mockRequestValidator);
        $response = $endpointHandler->handleEndpoint($mockEssenceRequest, $mockGetEndpoint);
        $this->assertEquals($mockEssenceResponse,$response);
    }

    /**
     * @return Request|MockObject
     * @throws ReflectionException
     */
    public function createRequestMock()
    {
        /** @var Request | MockObject $mockEssenceRequest */
        $mockEssenceRequest = $this->createMock(Request::class);
        $mockEssenceRequest->method('getRequestStartLine')->willReturn($this->createStartLineMock());
        return $mockEssenceRequest;
    }

    public function createStartLineMock()
    {
        $mockStartLine = $this->createMock(RequestStartLine::class);
        $mockStartLine->method('getHTTPMethod')->willReturn('GET');
        return $mockStartLine;
    }

    /**
     * @return Response|MockObject
     * @throws ReflectionException
     */
    public function createResponseMock()
    {
        /** @var Response | MockObject $mockEssenceResponse */
        $mockEssenceResponse = $this->createMock(Response::class);
        return $mockEssenceResponse;
    }

    /**
     * @param Response $responseMock
     * @return ResponseWrapper|MockObject
     * @throws ReflectionException
     */
    public function createResponseWrapperMock($responseMock)
    {
        /** @var ResponseWrapper | MockObject $mockEssenceResponse */
        $mockEssenceResponseWrapper = $this->createMock(ResponseWrapper::class);
        $mockEssenceResponseWrapper->method('getResponse')->willReturn($responseMock);
        return $mockEssenceResponseWrapper;
    }

    /**
     * @param $mockEssenceResponse
     * @return Get|MockObject
     * @throws ReflectionException
     */
    public function createEndpointMock($mockEssenceResponse)
    {
        /** @var Get | MockObject $mockGetEndpoint */
        $mockGetEndpoint = $this->createMock(Get::class);
        $mockGetEndpoint->method('get')->willReturn($mockEssenceResponse);
        return $mockGetEndpoint;
    }

    /**
     * @return RequestEndpointValidator|MockObject
     * @throws ReflectionException
     */
    public function createValidatorMock()
    {
        /** @var RequestEndpointValidator | MockObject $mockRequestValidator */
        $mockRequestValidator = $this->createMock(RequestEndpointValidator::class);
        $mockRequestValidator->method('endpointCanHandleRequest')->willReturn(true);
        return $mockRequestValidator;
    }
}
