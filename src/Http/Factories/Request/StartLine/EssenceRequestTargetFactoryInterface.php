<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use Essence\Http\Messages\Request\StartLine\EssenceRequestTargetInterface;

interface EssenceRequestTargetFactoryInterface
{
    public function getRequestTarget() : EssenceRequestTargetInterface;
}