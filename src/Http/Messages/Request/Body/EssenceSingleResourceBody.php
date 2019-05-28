<?php


namespace Essence\Http\Messages\Request\Body;


final class EssenceSingleResourceBody implements SingleResourceBody
{
    public function getContents(): string
    {
        return file_get_contents('php://input');
    }
}