<?php

namespace Essence\Http\Messages\Request;


use Psr\Http\Message\RequestInterface;

abstract class RestRequest implements EssenceRequest
{
    public function getScheme(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    public function getHost(): string
    {
        return $_SERVER['SERVER_NAME'];
    }

    public function getPort(): int
    {
        return (int)$_SERVER['SERVER_PORT'];
    }

    public function getPath() : string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getRestVerb(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getHeaders(): array
    {
        return apache_request_headers();
    }

    public function getQueryParameters(): array
    {
        return $_GET;
    }

    public function getFormData(): array
    {
        return $_POST;
    }

    public function getBody(): string
    {
        return file_get_contents('php://input');
    }

    abstract public function toPsr7(): RequestInterface;
 }