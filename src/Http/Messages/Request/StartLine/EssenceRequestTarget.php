<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssenceRequestTarget implements EssenceRequestTargetInterface
{
    private string $path;

    private EssenceQueryParametersInterface $queryStrings;

    public function __construct(string $path, EssenceQueryParametersInterface $queryStrings)
    {
        $this->path = $path;
        $this->queryStrings = $queryStrings;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQueryStrings(): EssenceQueryParametersInterface
    {
        return $this->queryStrings;
    }
}