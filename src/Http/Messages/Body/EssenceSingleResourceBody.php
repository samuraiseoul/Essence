<?php


namespace Essence\Http\Messages\Body;


final class EssenceSingleResourceBody implements SingleResourceBody
{
    /** @var string */
    private $contents;

    public function __construct(string $contents)
    {
        $this->contents = $contents;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}