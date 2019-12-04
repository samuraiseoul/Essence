<?php

namespace Essence\Http\Messages\Body;

interface SingleResourceRequestBody extends Body {
    // could be file contents, json, anything; but must be one part
    public function getContents() : string;

    public function getPostParameters() : PostParameters;
}