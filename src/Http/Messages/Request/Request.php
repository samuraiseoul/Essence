<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Body;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;

interface Request
{
    public function getStartLine() : RequestStartLine;

    public function getHeaders() : Headers;

    public function getBody() : Body;

    public function toPsr7(): PsrRequestInterface;
}