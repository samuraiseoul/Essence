<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssencePathParameters implements PathParameters
{
    /** @var string[] */
    private $pathParameters;

    public function __construct(array $pathParameters)
    {
        $this->pathParameters = $pathParameters;
    }

    public function get(string $key) : ?string
    {
        return $this->pathParameters[$key] ?? null;
    }
}