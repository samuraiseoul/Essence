<?php


namespace Essence\Http\Endpoints\Middleware;


use Essence\Http\Messages\Request\EssenceRequestInterface;

interface EssencePreware
{
    public function handle(EssenceRequestInterface $request) : void;
}