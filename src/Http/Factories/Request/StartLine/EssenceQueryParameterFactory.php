<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParameters;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;

final class EssenceQueryParameterFactory implements EssenceQueryParametersFactoryInterface
{
    private ?EssenceQueryParametersInterface $queryParameters = null;

    public function getQueryParameters(): EssenceQueryParametersInterface
    {
        return $this->queryParameters ?? $this->queryParameters = $this->createQueryParameters();
    }

    private function createQueryParameters() : EssenceQueryParametersInterface
    {
        if($this->queryParameters) {
            throw new BadMethodCallException('QueryParameters have already been instantiated!');
        }
        return new EssenceQueryParameters($_GET);
    }
}