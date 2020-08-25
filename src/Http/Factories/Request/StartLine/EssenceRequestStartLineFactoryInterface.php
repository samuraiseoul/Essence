<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLineInterface;

interface EssenceRequestStartLineFactoryInterface
{
    public function getStartLine() : EssenceRequestStartLineInterface;
}