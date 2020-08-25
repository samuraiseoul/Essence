<?php


namespace Essence\Http\Messages\Request\Factories\Headers;


use Essence\Http\Messages\Headers\EssenceHeadersInterface;

interface EssenceRequestHeadersFactoryInterface
{
    public function getHeaders() : EssenceHeadersInterface;
}