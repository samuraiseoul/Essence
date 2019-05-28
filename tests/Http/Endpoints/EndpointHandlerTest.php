<?php

namespace Essence\Tests\Http;

use Essence\Http\Endpoints\EndpointHandler;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Request\RequestStartLine;
use Essence\Http\Messages\Request\Validator\RequestEndpointValidationInterface;
use Essence\Http\Messages\Response\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EndpointTest extends TestCase
{
    public function testRequestValidated() : void {
        $mockEssenceRequest = $this->createRequestMock();
        $mockEssenceResponse = $this->createResponseMock();
        $mockGetEndpoint = $this->createEndpointMock($mockEssenceResponse);
        $mockRequestValidator = $this->createValidatorMock();

        $endpointHandler = new EndpointHandler($mockRequestValidator);
        $response = $endpointHandler->handleEndpoint($mockEssenceRequest, $mockGetEndpoint);
        $this->assertEquals($mockEssenceResponse,$response);
    }

    /**
     * @return RequestInterface|MockObject
     * @throws ReflectionException
     */
    public function createRequestMock()
    {
        /** @var RequestInterface | MockObject $mockEssenceRequest */
        $mockEssenceRequest = $this->createMock(RequestInterface::class);
        $mockEssenceRequest->method('getStartLine')->willReturn($this->createStartLineMock());
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
     * @return RequestEndpointValidationInterface|MockObject
     * @throws ReflectionException
     */
    public function createValidatorMock()
    {
        /** @var RequestEndpointValidationInterface | MockObject $mockRequestValidator */
        $mockRequestValidator = $this->createMock(RequestEndpointValidationInterface::class);
        $mockRequestValidator->method('endpointCanHandleRequest')->willReturn(true);
        return $mockRequestValidator;
    }
}
