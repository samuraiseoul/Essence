<?php


namespace Essence\Http\Messages\Headers;


interface EssenceHeaderInterface
{
    public function getHeaderName() : string;

    public function getHeaderValue() : string;
}