<?php


namespace Essence\Http\Endpoints\Middleware;



use Essence\Http\Messages\Request\EssenceRequest;

interface EssencePreware
{
    public function handle(EssenceRequest $request) : void;
}