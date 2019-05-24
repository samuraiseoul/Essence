<?php


namespace Essence\Http;


final class RestVerbs
{
    public const POST = 'POST';
    public const GET = 'GET';
    public const PUT = 'PUT';
    public const PATCH = 'PATCH';
    public const DELETE = 'DELETE';
    public const OPTIONS = 'OPTIONS';
    public const HEAD = 'HEAD';
    public const CONNECT = 'CONNECT';
    public const TRACE = 'TRACE';

    public const VERBS = [
        self::GET,
        self::PATCH,
        self::POST,
        self::PUT,
        self::DELETE,
        self::OPTIONS,
        self::CONNECT,
        self::HEAD,
        self::TRACE
    ];

    public function __construct()
    {
        throw new \BadMethodCallException('HTTP REST Verb class should never be instantiated!');
    }
}