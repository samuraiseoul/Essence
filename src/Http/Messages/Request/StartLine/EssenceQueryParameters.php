<?php


namespace Essence\Http\Messages\Request\StartLine;


final class EssenceQueryParameters implements EssenceQueryParametersInterface
{
    /** @var string[] */
    private array $queryParameters;

    public function __construct(array $queryParameters)
    {
        $this->queryParameters = $queryParameters;
    }

    private function get(string $key) : ?string
    {
        return $this->queryParameters[$key] ?? null;
    }

    public function getAsString(string $key): ?string
    {
        return $this->get($key);
    }

    public function getAsInt(string $key): ?int
    {
        return $this->get($key);
    }

    public function getAsFloat(string $key): ?float
    {
        return $this->get($key);
    }

    public function getAsBool(string $key): ?bool
    {
        return $this->get($key);
    }
}