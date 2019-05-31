<?php


namespace Essence\Http\Messages\Body;


interface ChunkedResourceResponseBody extends Body
{
    public function addChunk(string $chunk) : self;
}