<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\Header;
use Essence\Http\Messages\Headers;

interface ResponseHeaders extends Headers
{
    public function addHeader(Header $header) : self;
}