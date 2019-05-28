<?php


namespace Essence\Http\Messages\Response\StartLine;


use Essence\Http\Messages\StartLine;

interface ResponseStartLine extends StartLine
{
    public function setProtocol(string $protocol) : self;

    public function setStatusCode(int $statusCode) : self;

    public function setStatusText(string $statusText) : self;
}