<?php

namespace Essence\Http\Messages\Request;

interface SingleResourceBody extends RequestBody {
    // could be file contents, json, anything; but must be one part
    public function getContents() : string;
}