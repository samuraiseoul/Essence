<?php


namespace Essence\Http\Messages\Response;


interface SingleResourceResponseBody extends ResponseBody
{
    public function setBody(string $body) : void;
}