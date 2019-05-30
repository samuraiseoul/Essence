<?php


namespace Essence\Tests\Http\Messages\Request\Validator;


use Essence\Helpers\Rest\RestConstants;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Endpoints\Methods\RestVerb;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Essence\Http\Messages\Request\Validator\EssenceRequestEndpointValidator;
use Essence\Http\Messages\StartLine;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestEndpointValidatorTest extends TestCase
{
    private const VALID_VERB = RestConstants::GET;

    private const INVALID_VERB = RestConstants::POST;

    public function testEndpointCanHandleRequest() : void {
        $validator = new EssenceRequestEndpointValidator();
        $isValid = $validator->endpointCanHandleRequest($this->createEndpointMock(), $this->createValidRequestMock());
        $this->assertTrue($isValid);
    }

    public function testEndpointCanNotHandleRequest() : void {
        $validator = new EssenceRequestEndpointValidator();
        $isValid = $validator->endpointCanHandleRequest($this->createEndpointMock(), $this->createInvalidRequestMock());
        $this->assertFalse($isValid);
    }

    /**
     * @return MockObject | Request
     * @throws ReflectionException
     */
    private function createValidRequestMock() {
        $requestMock = $this->createMock(Request::class);
        $requestMock->method('getStartLine')->willReturn($this->createValidStartLineMock());
        return $requestMock;
    }

    /**
     * @return MockObject | StartLine
     * @throws ReflectionException
     */
    private function createValidStartLineMock() {
        $startLineMock = $this->createMock(RequestStartLine::class);
        $startLineMock->method('getHTTPMethod')->willReturn(RestConstants::GET);
        return $startLineMock;
    }

    /**
     * @return MockObject | Request
     * @throws ReflectionException
     */
    private function createInvalidRequestMock() {
        $requestMock = $this->createMock(Request::class);
        $requestMock->method('getStartLine')->willReturn($this->createInvalidStartLineMock());
        return $requestMock;
    }

    /**
     * @return MockObject | StartLine
     * @throws ReflectionException
     */
    private function createInvalidStartLineMock() {
        $startLineMock = $this->createMock(RequestStartLine::class);
        $startLineMock->method('getHTTPMethod')->willReturn(self::INVALID_VERB);
        return $startLineMock;
    }

    /**
     * @return MockObject | Get
     * @throws ReflectionException
     */
    private function createEndpointMock() {
        $endpointMock = $this->createMock(RestVerb::VERB_INTERFACE_MAP[self::VALID_VERB]);
        return $endpointMock;
    }
}