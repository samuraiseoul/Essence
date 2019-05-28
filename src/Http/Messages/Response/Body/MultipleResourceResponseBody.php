<?php


namespace Essence\Http\Messages\Response\Body;


interface MultipleResourceResponseBody extends ResponseBody
{
    public function addPart(string $part) : self;
}