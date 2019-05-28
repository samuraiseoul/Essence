<?php


namespace Essence\Http\Messages\Response;


interface MultipleResourceResponseBody extends ResponseBody
{
    public function addPart(string $part) : self;
}