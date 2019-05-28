<?php


namespace Essence\Http\Messages\Response;


interface ChunkedResourceResponseBody extends ResponseBody
{
    public function addChunk(string $chunk) : self;
}