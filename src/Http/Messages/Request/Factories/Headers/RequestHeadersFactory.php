<?php


namespace Essence\Http\Messages\Request\Factories\Headers;


use Essence\Http\Messages\Headers\Headers;

interface RequestHeadersFactory
{
    public function getHeaders() : Headers;
}