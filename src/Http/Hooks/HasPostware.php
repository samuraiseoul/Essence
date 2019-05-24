<?php


namespace Essence\Http\Hooks;


interface HasPostware extends HasHook
{
    public function getPostware() : array;
}