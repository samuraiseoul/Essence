<?php


namespace Essence\Http\Endpoints\Middleware;


use Essence\Http\Messages\Response\EssenceResponse;

interface EssencePostware
{
    public function handle(EssenceResponse $response) : void;
}