<?php


namespace Essence\Http\Messages\Request\Headers\Factories;


use Essence\Http\Messages\Headers;

interface RequestHeadersFactory
{
    public function getHeaders() : Headers;
}