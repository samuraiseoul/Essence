<?php


namespace Essence\Http\Messages\Request;


interface RequestStartLineFactory
{
    public function getStartLine() : RequestStartLine;
}