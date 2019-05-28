<?php


namespace Essence\Http\Messages\Request\Headers;


final class EssenceRequestHeader implements RequestHeader
{
    /** @var string */
    private $name;

    /** @var string */
    private $value;

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
        return $this->getHeaderValue();
    }
}