<?php

namespace Essence\Http\Messages\Body;

interface SingleResourceBody extends Body {
    // could be file contents, json, anything; but must be one part
    public function getContents() : string;
}