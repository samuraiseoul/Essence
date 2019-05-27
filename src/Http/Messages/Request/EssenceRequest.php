<?php


namespace Essence\Http\Messages\Request;


use Psr\Http\Message\RequestInterface;

interface EssenceRequest
{
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