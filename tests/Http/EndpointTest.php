<?php

namespace Essence\Tests\Http;

use DG\BypassFinals;
use Essence\Http\Endpoint;
use Essence\Http\EndpointRunner;
use Essence\Http\Methods\Get;
use Essence\Http\RestVerbs;
use Essence\Request\MethodRequests\GetRequest;
use Essence\Response\BaseResponse;
use Essence\Response\JsonResponse;
use Essence\Response\ResponseFormat;
use JsonSerializable;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    public function testWorking() : void {
        $this->assertTrue(true);
    }

    public function testGetRequest() : void {
        BypassFinals::enable();
        $mockRequest = $this->createMock(GetRequest::class)->method('getRestVerb')->willReturn(RestVerbs::GET);

        /** @var EndpointRunner | MockObject $mockRunner */
        $mockRunner = $this->createMock(EndpointRunner::class);
        $mockRunner->method('getRequest')->with()->willReturn($mockRequest);

        $this->expectExceptionCode(200);
        $mockRunner->handleEndpoint(new class() extends Endpoint implements Get {
            public function get(GetRequest $request): BaseResponse
            {
                return new JsonResponse( new class() extends ResponseFormat implements JsonSerializable {
                    public function jsonSerialize()
                    {
                        throw new \Exception("Excepted!", 200);
                    }
                });
            }
        });
    }
}
