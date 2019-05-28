<?php


namespace Essence\Http\Messages\Request\StartLine\Factories;


use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParameters;
use Essence\Http\Messages\Request\StartLine\QueryParameters;

final class EssenceQueryParameterFactory implements QueryParametersFactory
{
    /** @var QueryParameters */
    private $queryParameters;

    public function getQueryParameters(): QueryParameters
    {
        return $this->queryParameters ?? $this->queryParameters = $this->createQueryParameters();
    }

    private function createQueryParameters() : QueryParameters
    {
        if($this->queryParameters) {
            throw new BadMethodCallException("QueryParameters have already been instantiated!");
        }
        return new EssenceQueryParameters($_GET);
    }
}