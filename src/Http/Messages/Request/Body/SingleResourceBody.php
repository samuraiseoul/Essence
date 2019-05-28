<?php

namespace Essence\Http\Messages\Request\Body;

interface SingleResourceBody extends RequestBody {
    // could be file contents, json, anything; but must be one part
    public function getContents() : string;
}