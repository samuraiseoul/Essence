<?php


namespace Essence\Http\Messages\Request\StartLine;


interface PathParameters
{
    public function get(string $key) : ?string;
}