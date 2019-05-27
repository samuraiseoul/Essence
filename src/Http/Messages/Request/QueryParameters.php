<?php


namespace Essence\Http\Messages\Request;


interface QueryParameters
{
    public function get(string $key);
}