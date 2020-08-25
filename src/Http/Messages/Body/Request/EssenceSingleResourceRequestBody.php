<?php


namespace Essence\Http\Messages\Body\Request;


final class EssenceSingleResourceRequestBody implements EssenceSingleResourceRequestBodyInterface
{
    private string $contents;

    public function __construct(string $contents)
    {
        $this->contents = $contents;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}