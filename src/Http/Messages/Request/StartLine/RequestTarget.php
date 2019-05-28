<?php


namespace Essence\Http\Messages\Request;


interface RequestTarget
{
    public function getPath(): string;

    public function getQueryStrings() : QueryParameters;
}