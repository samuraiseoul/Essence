<?php


namespace Essence\Http\Messages\Request\StartLine;


use Essence\Http\Messages\StartLine;

interface RequestStartLine extends StartLine
{
    public function getHTTPMethod() : string;

    public function getRequestTarget() : RequestTarget;

    public function getHTTPVersion() : string;
}