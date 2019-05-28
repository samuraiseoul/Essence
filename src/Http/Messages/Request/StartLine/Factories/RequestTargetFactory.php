<?php


namespace Essence\Http\Messages\Request\StartLine\Factories;


use Essence\Http\Messages\Request\StartLine\RequestTarget;

interface RequestTargetFactory
{
    public function getRequestTarget() : RequestTarget;
}