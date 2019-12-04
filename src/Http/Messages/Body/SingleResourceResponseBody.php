<?php

namespace Essence\Http\Messages\Body;

use Essence\Http\Messages\Body\Body;

interface SingleResourceResponseBody extends Body {
    public function getContents() : string;
}