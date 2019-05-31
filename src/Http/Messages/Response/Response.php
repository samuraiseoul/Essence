<?php


namespace Essence\Http\Messages\Response;

use Essence\Http\Messages\HttpMessage;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;

interface Response extends HttpMessage
{
    public function getResponseStartLine() : ResponseStartLine;
}