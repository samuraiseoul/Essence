<?php

namespace Essence\Http\Messages\Body\Response;

final class EssenceSingleResourceResponseBody implements EssenceSingleResourceResponseBodyInterface {
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