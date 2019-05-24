<?php

namespace Essence\Http\Methods;

use Essence\Http\RestVerbs;

interface RestVerb
{
    public const VERB_INTERFACE_MAP = [
        RestVerbs::GET => Get::class,
        RestVerbs::POST => Post::class,
        RestVerbs::PUT => Put::class,
        RestVerbs::PATCH => Patch::class,
        RestVerbs::DELETE => Delete::class
    ];
}