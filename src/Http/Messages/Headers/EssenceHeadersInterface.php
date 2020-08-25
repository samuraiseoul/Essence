<?php


namespace Essence\Http\Messages\Headers;


interface EssenceHeadersInterface
{
    public function get(string $headerName) : EssenceHeaderInterface;

    /**
     * @return EssenceHeaderInterface[]
     */
    public function all() : array;
}