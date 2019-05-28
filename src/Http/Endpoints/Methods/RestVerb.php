<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Http\Endpoints\Endpoint;
use Essence\Utilities\RestConstants;

interface RestVerb extends Endpoint
{
    public const VERB_INTERFACE_MAP = [
        RestConstants::GET => Get::class,
        RestConstants::POST => Post::class,
        RestConstants::PUT => Put::class,
        RestConstants::PATCH => Patch::class,
        RestConstants::DELETE => Delete::class
    ];
}