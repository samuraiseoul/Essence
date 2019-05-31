<?php

namespace Essence\Http\Endpoints\Methods;

use Essence\Helpers\Rest\RestConstants;
use Essence\Http\Endpoints\Endpoint;

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