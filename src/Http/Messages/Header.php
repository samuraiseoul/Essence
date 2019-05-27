<?php


namespace Essence\Http\Messages;


interface Header
{
    public function getHeaderName() : string;

    public function getHeaderValue() : string;
}