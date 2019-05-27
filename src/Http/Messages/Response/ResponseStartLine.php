<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\StartLine;

interface ResponseStartLine extends StartLine
{
    public function setProtocol(string $protocol) : void;

    public function setStatusCode(int $statusCode) : void;

    public function setStatusText(string $statusText) : void;
}