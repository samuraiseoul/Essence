<?php


namespace Essence\Http\Messages\Body;


final class EssenceMultipleResourceBody implements MultipleResourceBody
{
    private array $parts;

    public function __construct(array $parts)
    {
        $this->parts = $parts;
    }

    public function getParts(): array
    {
        return $this->parts;
    }
}