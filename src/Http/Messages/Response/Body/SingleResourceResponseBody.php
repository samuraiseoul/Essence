<?php


namespace Essence\Http\Messages\Response\Body;


interface SingleResourceResponseBody extends ResponseBody
{
    public function setBody(string $body) : void;
}