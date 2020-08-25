<?php


namespace Essence;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Endpoints\Methods\RestVerb;
use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Request\Factories\EssenceRequestFactory;
use HttpRequestException;

final class Essence {
    private EssenceRequestInterface $essenceRequest;

    public function __construct() {
        $this->essenceRequest = EssenceRequestFactory::instantiate()->getRequest();
    }

    public function handle(Endpoint $endpoint) : void {
        $this->validateEndpointImplemented($endpoint);
        $endpoint->{$this->essenceRequest->getStartLine()->getHTTPMethod()}($this->essenceRequest);
    }

    private function validateEndpointImplemented(Endpoint $endpoint): void {
        $expectedRestVerbClass = RestVerb::VERB_INTERFACE_MAP[$this->essenceRequest->getStartLine()->getHTTPMethod()];
        if($endpoint instanceof $expectedRestVerbClass) { return; }
        throw new HttpRequestException("Endpoint does not implement required interface: $expectedRestVerbClass");
    }
}