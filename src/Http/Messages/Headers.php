<?php


namespace Essence\Http\Messages;


interface Headers
{
    public function get(string $headerName) : Header;
}