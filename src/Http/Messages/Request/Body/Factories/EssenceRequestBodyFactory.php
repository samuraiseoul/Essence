<?php


namespace Essence\Http\Messages\Request\Body\Factories;


use Essence\Http\Messages\Request\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Request\Body\EssenceSingleResourceBody;
use Essence\Http\Messages\Request\Body\RequestBody;

final class EssenceRequestBodyFactory implements RequestBodyFactory
{

    public function getRequestBody(): RequestBody
    {
        if($_POST || $_FILES) {
            return new EssenceMultipleResourceBody();
        }
        return new EssenceSingleResourceBody();
    }
}