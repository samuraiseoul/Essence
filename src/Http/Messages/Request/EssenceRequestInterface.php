<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Body;
use Essence\Http\Messages\Headers;
use Psr\Http\Message\RequestInterface;

interface EssenceRequestInterface
{
    public function getStartLine() : RequestStartLine;

    public function getHeaders() : Headers;

    public function getBody() : Body;

    public function toPsr7(): RequestInterface;
}

/*
    public function getScheme(): string;

    public function getHost(): string;

    public function getPort(): int;

    public function getPath() : string;

    public function getRestVerb(): string;

    public function getHeaders() : array;

    public function getQueryParameters() : array;

    public function getFormData() : array;

    public function getBody() : string;

    public function toPsr7(): RequestInterface;
}
*/