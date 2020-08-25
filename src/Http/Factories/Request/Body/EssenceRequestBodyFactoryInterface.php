<?php


namespace Essence\Http\Messages\Request\Factories\Body;


use Essence\Http\Messages\Body\EssenceBodyInterface;

interface EssenceRequestBodyFactoryInterface
{
    public function getRequestBody() : EssenceBodyInterface;
}