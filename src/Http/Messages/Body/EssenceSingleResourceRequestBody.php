<?php


namespace Essence\Http\Messages\Body;


final class EssenceSingleResourceRequestBody implements SingleResourceRequestBody
{
    private string $contents;

    private PostParameters $postParameters;

    public function __construct(string $contents, PostParameters $postParameters)
    {
        $this->contents = $contents;
        $this->postParameters = $postParameters;
    }

    public function getContents(): string
    {
        return $this->contents;
    }

    public function getPostParameters(): PostParameters
    {
        return $this->postParameters;
    }
}