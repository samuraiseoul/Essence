<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;

interface EssenceQueryParametersFactoryInterface
{
    public function getQueryParameters() : EssenceQueryParametersInterface;
}