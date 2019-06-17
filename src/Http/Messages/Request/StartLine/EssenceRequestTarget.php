<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssenceRequestTarget implements RequestTarget
{
    /** @var string */
    private $path;

    /** @var QueryParameters */
    private $queryStrings;

    /** @var PathParameters */
    private $pathParameters;

    public function __construct(string $path, QueryParameters $queryStrings, PathParameters $pathParameters)
    {
        $this->path = $path;
        $this->queryStrings = $queryStrings;
        $this->pathParameters = $pathParameters;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQueryStrings(): QueryParameters
    {
        return $this->queryStrings;
    }

    public function getPathParameters(): PathParameters
    {
        return $this->pathParameters;
    }
}