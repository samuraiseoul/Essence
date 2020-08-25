<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTarget;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTargetInterface;

final class EssenceRequestTargetFactory implements EssenceRequestTargetFactoryInterface
{
    private ?EssenceRequestTargetInterface $requestTarget = null;

    private EssenceQueryParametersFactoryInterface $queryParametersFactory;

    public function __construct(EssenceQueryParametersFactoryInterface $queryParametersFactory)
    {
        $this->queryParametersFactory = $queryParametersFactory;
    }

    public function getRequestTarget(): EssenceRequestTargetInterface
    {
        return $this->requestTarget ?? $this->requestTarget = $this->createEssenceRequestTarget();
    }

    private function getPath() : string {
        return $_SERVER['REQUEST_URI'];
    }

    private function getQueryParameters() : EssenceQueryParametersInterface {
        return $this->queryParametersFactory->getQueryParameters();
    }

    private function createEssenceRequestTarget(): EssenceRequestTargetInterface
    {
        if($this->requestTarget) {
            throw new BadMethodCallException('Request target has already been instantiated!');
        }
        return new EssenceRequestTarget($this->getPath(), $this->getQueryParameters());
    }
}