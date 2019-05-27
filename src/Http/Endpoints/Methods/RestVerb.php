<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Endpoints\Endpoint;
use Essence\Utilities\RestVerbs;

interface RestVerb extends Endpoint
{
    public const VERB_INTERFACE_MAP = [
        RestVerbs::GET => Get::class,
        RestVerbs::POST => Post::class,
        RestVerbs::PUT => Put::class,
        RestVerbs::PATCH => Patch::class,
        RestVerbs::DELETE => Delete::class
    ];
}