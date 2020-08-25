<?php


namespace Essence\Http\Messages\Request\StartLine;


interface EssenceQueryParametersInterface
{
    public function getAsString(string $key): ?string;

    public function getAsInt(string $key): ?int;

    public function getAsFloat(string $key): ?float;

    public function getAsBool(string $key): ?bool;
}