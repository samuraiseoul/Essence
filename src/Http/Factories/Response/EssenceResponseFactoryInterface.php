<?php


namespace Essence\Http\Messages\Response;


use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapperInterface;

interface EssenceResponseFactoryInterface
{
    public function fromResponseWrapper(EssenceResponseWrapperInterface $responseWrapper) : EssenceResponseInterface;
}