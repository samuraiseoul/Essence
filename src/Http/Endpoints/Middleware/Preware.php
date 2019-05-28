<?php


namespace Essence\Http\Endpoints\Middleware;


use Essence\Http\Messages\Request\RequestInterface;

interface Preware
{
    public function handle(RequestInterface $request) : void;
}