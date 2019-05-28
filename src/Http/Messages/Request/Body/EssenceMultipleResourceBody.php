<?php


namespace Essence\Http\Messages\Request\Body;


final class EssenceMultipleResourceBody implements MultipleResourceBody
{
    public function getParts(): array
    {
        return [$_POST, $_FILES];
    }
}