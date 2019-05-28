<?php


namespace Essence\Http\Messages\Request\StartLine\Factories;


use Essence\Http\Messages\Request\StartLine\RequestStartLine;

interface RequestStartLineFactory
{
    public function getStartLine() : RequestStartLine;
}