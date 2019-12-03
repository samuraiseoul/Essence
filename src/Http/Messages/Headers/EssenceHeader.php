<?php


namespace Essence\Http\Messages\Headers;


final class EssenceHeader implements Header
{
    private string $name;

    private string $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getHeaderName(): string
    {
        return $this->name;
    }

    public function getHeaderValue(): string
    {
        return $this->value;
    }
}