<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssenceRequestTarget implements RequestTarget
{
    private string $path;

    private QueryParameters $queryStrings;

    public function __construct(string $path, QueryParameters $queryStrings)
    {
        $this->path = $path;
        $this->queryStrings = $queryStrings;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQueryStrings(): QueryParameters
    {
        return $this->queryStrings;
    }
}