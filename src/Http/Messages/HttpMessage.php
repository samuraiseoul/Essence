<?php


namespace Essence\Http\Messages;


use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Headers\Headers;

interface HttpMessage
{
    public function getStartLine() : StartLine;

    public function getHeaders() : Headers;

    public function getBody() : Body;
}