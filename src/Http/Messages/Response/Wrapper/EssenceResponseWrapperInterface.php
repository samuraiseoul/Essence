<?php


namespace Essence\Http\Messages\Response\Wrapper;


use Essence\Http\Messages\Headers\EssenceHeadersInterface;

interface EssenceResponseWrapperInterface
{
    public function getHeaders() : ?EssenceHeadersInterface;

    public function getContents() : string;
}