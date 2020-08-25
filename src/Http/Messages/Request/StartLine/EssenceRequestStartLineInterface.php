<?php


namespace Essence\Http\Messages\Request\StartLine;


use Essence\Http\Messages\EssenceStartLineInterface;

interface EssenceRequestStartLineInterface extends EssenceStartLineInterface
{
    public function getHTTPMethod() : string;

    public function getRequestTarget() : EssenceRequestTargetInterface;

    public function getHTTPVersion() : string;
}