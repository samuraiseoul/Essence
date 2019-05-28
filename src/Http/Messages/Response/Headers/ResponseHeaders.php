<?php


namespace Essence\Http\Messages\Response\Headers;


use Essence\Http\Messages\Headers;

interface ResponseHeaders extends Headers
{
    public function addHeader(ResponseHeader $header) : self;
}