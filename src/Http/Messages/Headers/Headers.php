<?php


namespace Essence\Http\Messages\Headers;


interface Headers
{
    public function get(string $headerName) : Header;

    /**
     * @return Header[]
     */
    public function all() : array;
}