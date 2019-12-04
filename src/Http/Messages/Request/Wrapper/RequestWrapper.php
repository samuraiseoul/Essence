<?php


namespace Essence\Http\Messages\Request\Wrapper;

use Essence\Http\Messages\Body\PostParameters;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\StartLine\QueryParameters;

interface RequestWrapper
{
    public function getQueryParameters() : QueryParameters;

    public function getPostParameters() : PostParameters;

    public function getRequest() : Request;
}