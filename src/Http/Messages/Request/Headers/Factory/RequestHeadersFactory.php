<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Messages\Headers;

interface RequestHeadersFactory
{
    public function getHeaders() : Headers;
}