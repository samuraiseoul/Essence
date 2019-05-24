<?php


namespace Essence\Http;


use Essence\Response\BaseResponse;

abstract class Postware
{
    abstract public function handle(BaseResponse $response) : void;
}