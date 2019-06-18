<?php


namespace Essence\Http\Messages\Request\Wrapper;

use Essence\Http\Messages\Request\Request;

interface RequestWrapper
{
    public function getQueryParameter(string $key) : ?string;

    public function getPostVariable(string $key) : ?string;

    public function getPathParameter(string $key) : string;

    public function getRequest() : Request;
}