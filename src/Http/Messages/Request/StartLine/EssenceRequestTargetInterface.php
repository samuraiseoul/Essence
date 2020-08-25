<?php


namespace Essence\Http\Messages\Request\StartLine;


interface EssenceRequestTargetInterface
{
    public function getPath(): string;

    public function getQueryStrings() : EssenceQueryParametersInterface;
}