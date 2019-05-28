<?php


namespace Essence\Http\Messages\Request\Body\Factories;


use Essence\Http\Messages\Request\Body\RequestBody;

interface RequestBodyFactory
{
    public function getRequestBody() : RequestBody;
}