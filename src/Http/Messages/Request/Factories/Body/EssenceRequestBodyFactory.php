<?php


namespace Essence\Http\Messages\Request\Factories\Body;



use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Body\EssencePostParameters;
use Essence\Http\Messages\Body\EssenceSingleResourceRequestBody;

final class EssenceRequestBodyFactory implements RequestBodyFactory
{
    public function getRequestBody(): Body
    {
        return new EssenceSingleResourceRequestBody(
            file_get_contents('php://input'),
            new EssencePostParameters($_POST)
        );
    }
}