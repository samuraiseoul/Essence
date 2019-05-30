<?php


namespace Essence\Http\Messages\Response;



use Essence\Http\Messages\Response\Body\ResponseBody;
use Essence\Http\Messages\Response\Headers\ResponseHeaders;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;

interface Response
{
    public function getStartLine() : ResponseStartLine;

    public function getHeaders() : ResponseHeaders;

    public function getBody() : ResponseBody;
}