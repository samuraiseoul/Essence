<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\QueryParameters;

interface QueryParametersFactory
{
    public function getQueryParameters() : QueryParameters;
}