<?php


namespace Http\Messages\Request\Wrapper;


use Essence\Http\Messages\Request\Request;
use Psr\Http\Message\RequestInterface;

interface RequestWrapper
{
    public function queryParameterAsString(string $key) : ?string;

    public function queryParameterAsInt(string $key) : ?int;

    public function queryParameterAsFloat(string $key) : ?float;

    public function queryParameterAsBool(string $key) : ?bool;

    public function postAsString(string $key) : ?string;

    public function postAsInt(string $key) : ?int;

    public function postAsFloat(string $key) : ?float;

    public function postAsBool(string $key) : ?bool;

    public function getBody() : string;

    public function getRequest() : Request;

    public function getPSRRequest() : RequestInterface;
}