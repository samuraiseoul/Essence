<?php


namespace Http\Messages\Request\Wrapper;


use BadMethodCallException;
use Essence\Http\Messages\Request\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Request\Body\EssenceSingleResourceBody;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\Request;
use Psr\Http\Message\RequestInterface;

final class EssenceRequestWrapper implements RequestWrapper
{
    /** @var EssenceRequest */
    private $request;

    /** @var RequestPsrConverter */
    private $converter;

    public function __construct(EssenceRequest $request, RequestPsrConverter $converter)
    {
        $this->request = $request;
        $this->converter = $converter;
    }

    private function getQueryParameter(string $key) {
        return $this->request->getStartLine()->getRequestTarget()->getQueryStrings()->get($key);
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

    public function getBody(): string
    {
        /** @var EssenceSingleResourceBody $requestBody */
        $requestBody = $this->request->getBody();
        if($requestBody instanceof EssenceSingleResourceBody) {
            return $requestBody->getContents();
        }
        throw new BadMethodCallException('Will not get body contents for multiple resource request bodies, those contents are in the post and file variables.');
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getPSRRequest(): RequestInterface
    {
        return $this->converter->convert($this->request);
    }
}