<?php


namespace Essence\Http\Messages\Request;


interface MultipleResourceBody extends RequestBody
{
    // Could be post params, files, anything; Has multiple of them though
    public function getParts() : array;
}