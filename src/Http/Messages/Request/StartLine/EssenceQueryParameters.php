<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssenceQueryParameters implements QueryParameters
{
    /** @var string[] */
    private $queryParameters;

    public function __construct(array $queryParameters)
    {
        $this->queryParameters = $queryParameters;
    }

    public function get(string $key) : string
    {
        return $this->queryParameters[$key];
    }
}