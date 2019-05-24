<?php

namespace Essence\Request;

abstract class Request
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
}