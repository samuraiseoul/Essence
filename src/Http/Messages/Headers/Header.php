<?php


namespace Essence\Http\Messages\Headers;


interface Header
{
    public function getHeaderName() : string;

    public function getHeaderValue() : string;
}