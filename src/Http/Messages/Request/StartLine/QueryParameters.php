<?php


namespace Essence\Http\Messages\Request\StartLine;


interface QueryParameters
{
    public function get(string $key) : string;
}