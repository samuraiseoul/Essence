<?php


namespace Essence\Http\Messages\Response\StartLine;

use Essence\Http\Messages\EssenceStartLineInterface;

interface EssenceResponseStartLineInterface extends EssenceStartLineInterface
{
    public function getProtocol() : string;

    public function getStatusCode() : int;

    public function getStatusText() : string;
}