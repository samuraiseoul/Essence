<?php


namespace Essence\Http\Messages\Response\Body;


interface ChunkedResourceResponseBody extends ResponseBody
{
    public function addChunk(string $chunk) : self;
}