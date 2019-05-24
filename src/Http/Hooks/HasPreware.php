<?php

namespace Essence\Http\Hooks;

interface HasPreware extends HasHook
{
    public function getPreware() : array;
}