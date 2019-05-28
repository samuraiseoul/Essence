<?php


namespace Essence\Http\Messages\Request\Body\Factories;


use Essence\Http\Messages\Request\RequestBody;

interface RequestBodyFactory
{
    public function getRequestBody() : RequestBody;
}