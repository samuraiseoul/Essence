<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\RequestStartLine;

interface RequestStartLineFactory
{
    public function getStartLine() : RequestStartLine;
}