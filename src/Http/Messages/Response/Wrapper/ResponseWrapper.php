<?php


namespace Essence\Http\Messages\Response\Wrapper;



use Essence\Http\Messages\Headers\Header;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Response\Response;

interface ResponseWrapper
{
    public function getHeaders() : ?Headers;

    public function getContents() : string;
}