<?php


namespace Essence\Http\Messages\Response\Emitters;


use Essence\Http\Messages\Response\Response;

interface Emitter
{
    public function emitResponse(Response $response) : void;
}