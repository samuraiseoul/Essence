<?php


namespace Essence\Http\Messages\Body\Request;

use Essence\Http\Messages\Body\EssenceBodyInterface;

interface EssenceHasResourceRequestBodyInterface extends EssenceBodyInterface {
    // could be file contents, json, anything; but must be one part
    public function getContents() : string;
}