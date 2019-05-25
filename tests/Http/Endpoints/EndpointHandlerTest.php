<?php

namespace Essence\Tests\Http;

use Essence\Http\Endpoints\EndpointHandler;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\RequestEndpointValidationInterface;
use Essence\Http\Messages\Response\EssenceResponse;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    public function testWorking() : void {
        $this->assertTrue(true);
    }

    public function testRequestValidated() : void {
        /** @var EssenceRequest | MockObject $mockEssenceRequest */
        $mockEssenceRequest = $this->createMock(EssenceRequest::class);
        $mockEssenceRequest->method('getRestVerb')->willReturn('GET');

        /** @var EssenceResponse | MockObject $mockEssenceResponse */
        $mockEssenceResponse = $this->createMock(EssenceResponse::class);

        /** @var Get | MockObject $mockGetEndpoint */
        $mockGetEndpoint = $this->createMock(Get::class);
        $mockGetEndpoint->method('get')->willReturn($mockEssenceResponse);

        /** @var RequestEndpointValidationInterface | MockObject $mockRequestValidator */
        $mockRequestValidator = $this->createMock(RequestEndpointValidationInterface::class);
        $mockRequestValidator->method('endpointCanHandleRequest')->willReturn(true);

        $endpointHandler = new EndpointHandler($mockRequestValidator);
        $response = $endpointHandler->handleEndpoint($mockEssenceRequest, $mockGetEndpoint);
        $this->assertEquals($mockEssenceResponse,$response);
    }
}
