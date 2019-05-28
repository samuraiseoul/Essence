<?php


namespace Essence\Http\Messages\Request;


interface RequestFactoryInterface
{
    public function getRequest() : RequestInterface;
}