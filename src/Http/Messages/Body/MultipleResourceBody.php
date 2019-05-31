<?php


namespace Essence\Http\Messages\Body;


interface MultipleResourceBody extends Body
{
    // Could be post params, files, anything; Has multiple of them though
    public function getParts() : array;
}