<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Request\Body\RequestBody;
use Essence\Http\Messages\Request\Headers\RequestHeaders;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;

interface Request
{
    public function getStartLine() : RequestStartLine;

    public function getHeaders() : RequestHeaders;

    public function getBody() : RequestBody;
}