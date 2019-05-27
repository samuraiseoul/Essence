<?php

namespace Essence\Tests\Http;

use Essence\Http\Endpoints\EndpointHandler;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\RequestEndpointValidationInterface;
use Essence\Http\Messages\Response\EssenceResponse;
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
     * @return EssenceRequest|MockObject
     * @throws ReflectionException
     */
    public function createRequestMock()
    {
        /** @var EssenceRequest | MockObject $mockEssenceRequest */
        $mockEssenceRequest = $this->createMock(EssenceRequest::class);
        $mockEssenceRequest->method('getRestVerb')->willReturn('GET');
        return $mockEssenceRequest;
    }

    /**
     * @return EssenceResponse|MockObject
     * @throws ReflectionException
     */
    public function createResponseMock()
    {
        /** @var EssenceResponse | MockObject $mockEssenceResponse */
        $mockEssenceResponse = $this->createMock(EssenceResponse::class);
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
