<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTarget;
use Essence\Http\Messages\Request\StartLine\QueryParameters;
use Essence\Http\Messages\Request\StartLine\RequestTarget;

final class EssenceRequestTargetFactory implements RequestTargetFactory
{
    private ?RequestTarget $requestTarget = null;

    private QueryParametersFactory $queryParametersFactory;

    public function __construct(QueryParametersFactory $queryParametersFactory)
    {
        $this->queryParametersFactory = $queryParametersFactory;
    }

    public function getRequestTarget(): RequestTarget
    {
        return $this->requestTarget ?? $this->requestTarget = $this->createEssenceRequestTarget();
    }

    private function getPath() : string {
        return $_SERVER['REQUEST_URI'];
    }

    private function getQueryParameters() : QueryParameters {
        return $this->queryParametersFactory->getQueryParameters();
    }

    private function createEssenceRequestTarget(): EssenceRequestTarget
    {
        if($this->requestTarget) {
            throw new BadMethodCallException('Request target has already been instantiated!');
        }
        return new EssenceRequestTarget($this->getPath(), $this->getQueryParameters());
    }
}