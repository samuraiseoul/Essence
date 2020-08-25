<?php


namespace Essence\Http\Messages\Request\Wrapper;

use Essence\Http\Messages\Body\EssencePostParametersInterface;
use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;

interface EssenceRequestWrapperInterface
{
    public function getQueryParameters() : EssenceQueryParametersInterface;

    public function getPostParameters() : EssencePostParametersInterface;

    public function getRequest() : EssenceRequestInterface;
}