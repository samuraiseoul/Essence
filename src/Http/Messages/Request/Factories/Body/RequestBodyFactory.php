<?php


namespace Essence\Http\Messages\Request\Factories\Body;


use Essence\Http\Messages\Body\Body;

interface RequestBodyFactory
{
    public function getRequestBody() : Body;
}