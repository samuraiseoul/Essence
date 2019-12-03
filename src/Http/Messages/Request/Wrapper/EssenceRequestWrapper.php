<?php


namespace Essence\Http\Messages\Request\Wrapper;

use BadMethodCallException;
use Essence\Http\Messages\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Request\Request;

final class EssenceRequestWrapper implements RequestWrapper
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function getQueryParameter(string $key) : string {
        $startLine = $this->request->getRequestStartLine();
        return $startLine->getRequestTarget()->getQueryStrings()->get($key);
    }

    private function getPostVariable(string $key) {
        /** @var EssenceMultipleResourceBody $requestBody */
        $requestBody = $this->request->getBody();
        if($requestBody instanceof EssenceMultipleResourceBody) {
            return $requestBody->getParts()[0][$key];
        }
        throw new BadMethodCallException('Will not get post vars for single resource request bodies, those contents should not be present.');
    }

    public function queryParameterAsString(string $key): ?string
    {
        return $this->getQueryParameter($key);
    }

    public function queryParameterAsInt(string $key): ?int
    {
        return $this->getQueryParameter($key);
    }

    public function queryParameterAsFloat(string $key): ?float
    {
        return $this->getQueryParameter($key);
    }

    public function queryParameterAsBool(string $key): ?bool
    {
        return $this->getQueryParameter($key);
    }

    public function postAsString(string $key): ?string
    {
        return $this->getPostVariable($key);
    }

    public function postAsInt(string $key): ?int
    {
        return $this->getPostVariable($key);
    }

    public function postAsFloat(string $key): ?float
    {
        return $this->getPostVariable($key);
    }

    public function postAsBool(string $key): ?bool
    {
        return $this->getPostVariable($key);
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}