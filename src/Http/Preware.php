<?php


namespace Essence\Http;


use Essence\Request\MethodRequests\RestRequest;

abstract class Preware
{
    abstract public function handle(RestRequest $request) : void;
}