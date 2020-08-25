<?php


namespace Essence\Http\Messages;


use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;

interface EssenceHttpMessageInterface
{
    public function getStartLine() : EssenceStartLineInterface;

    public function getHeaders() : EssenceHeadersInterface;

    public function getBody() : EssenceBodyInterface;
}