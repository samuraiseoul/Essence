<?php


namespace Essence\Http\Messages\Request\StartLine\Factories;


use Essence\Http\Messages\Request\StartLine\QueryParameters;

interface QueryParametersFactory
{
    public function getQueryParameters() : QueryParameters;
}