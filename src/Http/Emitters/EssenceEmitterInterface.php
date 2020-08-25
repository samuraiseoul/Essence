<?php


namespace Essence\Http\Emitters;


use Essence\Http\Messages\Response\EssenceResponseInterface;

interface EssenceEmitterInterface
{
    public function emitResponse(EssenceResponseInterface $response) : void;
}