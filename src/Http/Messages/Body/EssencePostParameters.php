<?php


namespace Essence\Http\Messages\Body;


final class EssencePostParameters implements PostParameters
{
    /** @var string[]  */
    private array $postParameters;

    public function __construct(array $postParameters)
    {
        $this->postParameters = $postParameters;
    }

    public function get(string $key) : ?string {
        return $this->postParameters[$key];
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