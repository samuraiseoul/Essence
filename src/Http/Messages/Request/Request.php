<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\HttpMessage;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;

interface Request extends HttpMessage
{
    public function getRequestStartLine() : RequestStartLine;
}