<?php


namespace Essence\Http\Messages\Request\Factories\Body;



use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Body\EssenceMultipleResourceBody;
use Essence\Http\Messages\Body\EssenceSingleResourceBody;

final class EssenceRequestBodyFactory implements RequestBodyFactory
{
    public function getRequestBody(): Body
    {
        if($_POST || $_FILES) {
            return new EssenceMultipleResourceBody([$_POST, $_FILES]);
        }
        return new EssenceSingleResourceBody(file_get_contents('php://input'));
    }
}