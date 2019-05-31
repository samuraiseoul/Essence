<?php


namespace Essence\Http\Messages\Request\Factory;


use Essence\Http\Messages\Request\Request;

interface RequestFactory
{
    public function getRequest() : Request;
}