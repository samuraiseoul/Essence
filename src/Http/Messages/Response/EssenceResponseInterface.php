<?php


namespace Essence\Http\Messages\Response;

use Essence\Http\Messages\EssenceHttpMessageInterface;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLineInterface;

interface EssenceResponseInterface extends EssenceHttpMessageInterface
{
    public function getResponseStartLine() : EssenceResponseStartLineInterface;
}