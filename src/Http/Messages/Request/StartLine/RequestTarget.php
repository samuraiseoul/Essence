<?php


namespace Essence\Http\Messages\Request\StartLine;


interface RequestTarget
{
    public function getPath(): string;

    public function getQueryStrings() : QueryParameters;

    public function getPathParameters() : PathParameters;
}