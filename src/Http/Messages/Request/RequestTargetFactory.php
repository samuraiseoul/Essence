<?php


namespace Essence\Http\Messages\Request;


interface RequestTargetFactory
{
    public function getRequestTarget() : RequestTarget;
}