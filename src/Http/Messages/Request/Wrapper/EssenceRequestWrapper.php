<?php


namespace Essence\Http\Messages\Request\Wrapper;

use BadMethodCallException;
use Essence\Http\Messages\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Request\Request;

final class EssenceRequestWrapper implements RequestWrapper
{
    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getQueryParameter(string $key) : string {
        $startLine = $this->request->getRequestStartLine();
        return $startLine->getRequestTarget()->getQueryStrings()->get($key);
    }

    public function getPostVariable(string $key) : string {
        /** @var EssenceMultipleResourceBody $requestBody */
        $requestBody = $this->request->getBody();
        if($requestBody instanceof EssenceMultipleResourceBody) {
            return $requestBody->getParts()[0][$key];
        }
        throw new BadMethodCallException('Will not get post vars for single resource request bodies, those contents should not be present.');
    }

    public function getPathParameter(string $key) : string {
        $requestStartLine = $this->request->getRequestStartLine();
        return $requestStartLine->getRequestTarget()->getPathParameters()->get($key);
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}