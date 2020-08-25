<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\EssenceHttpMessageInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLineInterface;

interface EssenceRequestInterface extends EssenceHttpMessageInterface
{
    public function getRequestStartLine() : EssenceRequestStartLineInterface; //TODO: Seems Redundant, getStartLine is in parent interface
}