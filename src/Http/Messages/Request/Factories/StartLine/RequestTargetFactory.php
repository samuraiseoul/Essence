<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\RequestTarget;

interface RequestTargetFactory
{
    public function getRequestTarget() : RequestTarget;
}