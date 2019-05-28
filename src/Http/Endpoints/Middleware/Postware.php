<?php


namespace Essence\Http\Endpoints\Middleware;


use Essence\Http\Messages\Response\Response;

interface Postware
{
    public function handle(Response $response) : void;
}