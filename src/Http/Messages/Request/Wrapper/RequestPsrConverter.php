<?php


namespace Http\Messages\Request\Wrapper;


use Essence\Http\Messages\Request\Request;
use Psr\Http\Message\RequestInterface;

interface RequestPsrConverter
{
    public function convert(Request $request) : RequestInterface;
}