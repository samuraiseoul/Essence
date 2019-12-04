<?php

namespace Essence\Http\Messages\Body;

use Essence\Http\Messages\Body\SingleResourceRequestBody;

final class EssenceSingleResourceResponseBody implements SingleResourceResponseBody {
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