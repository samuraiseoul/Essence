<?php


namespace Essence\Http\Messages\Request;


interface RequestFactory
{
    public function getRequest() : Request;
}