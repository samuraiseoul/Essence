<?php


namespace Essence\Http\Messages\Response\StartLine;

use Essence\Http\Messages\StartLine;

interface ResponseStartLine extends StartLine
{
    public function getProtocol() : string;

    public function getStatusCode() : int;

    public function getStatusText() : string;
}