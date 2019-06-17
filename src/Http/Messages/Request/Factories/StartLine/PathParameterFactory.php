<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;


use Essence\Http\Messages\Request\StartLine\PathParameters;

interface PathParameterFactory
{
    public function getPathParameters() : PathParameters;
}