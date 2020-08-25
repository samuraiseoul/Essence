<?php


namespace Essence\Http\Messages\Request\Factories;


use Essence\Http\Messages\Request\EssenceRequestInterface;

interface EssenceRequestFactoryInterface
{
    public function getRequest() : EssenceRequestInterface;

    public static function instantiate() : EssenceRequestFactoryInterface;
}