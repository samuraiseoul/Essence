<?php


namespace Essence\Http\Messages\Request\Factories\Body;


use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Body\EssencePostParameters;
use Essence\Http\Messages\Body\EssenceSingleResourceRequestBody;

final class EssenceRequestBodyFactory implements EssenceRequestBodyFactoryInterface
{
    public function getRequestBody(): EssenceBodyInterface
    {
        return new EssenceSingleResourceRequestBody(
            file_get_contents('php://input'),
            new EssencePostParameters($_POST)
        );
    }
}