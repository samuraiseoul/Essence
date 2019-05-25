<?php

namespace Essence\Hooks;

use DG\BypassFinals;
use PHPUnit\Runner\BeforeTestHook;

// https://www.tomasvotruba.cz/blog/2019/03/28/how-to-mock-final-classes-in-phpunit/
final class BypassFinalHook implements BeforeTestHook
{
    public function executeBeforeTest(string $test): void
    {
        BypassFinals::enable();
    }
}