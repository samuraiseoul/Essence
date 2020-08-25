<?php


namespace Essence\Http\Messages\Request\Factories;


use BadMethodCallException;
use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Request\Factories\Body\EssenceRequestBodyFactoryInterface;
use Essence\Http\Messages\Request\Factories\Headers\EssenceRequestHeadersFactoryInterface;
use Essence\Http\Messages\Request\Factories\StartLine\EssenceRequestStartLineFactoryInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLineInterface;

final class EssenceRequestFactory implements EssenceRequestFactoryInterface
{
    private ?EssenceRequestInterface $request = null;

    private EssenceRequestStartLineFactoryInterface $startLineFactory;

    private EssenceRequestHeadersFactoryInterface $headersFactory;

    private EssenceRequestBodyFactoryInterface $bodyFactory;

    public function __construct(EssenceRequestStartLineFactoryInterface $startLineFactory, EssenceRequestHeadersFactoryInterface $headersFactory, EssenceRequestBodyFactoryInterface $bodyFactory)
    {
        $this->startLineFactory = $startLineFactory;
        $this->headersFactory = $headersFactory;
        $this->bodyFactory = $bodyFactory;
    }

    public function getRequest(): EssenceRequestInterface
    {
        return $this->request ?? $this->request = $this->createEssenceRequest();
    }

    private function createEssenceRequest(): EssenceRequestInterface
    {
        if($this->request) {
            throw new BadMethodCallException('Recreating immutable request!');
        }
        return new EssenceRequest($this->getStartLine(), $this->getHeaders(), $this->getRequestBody());
    }

    private function getStartLine(): EssenceRequestStartLineInterface
    {
        return $this->startLineFactory->getStartLine();
    }

    private function getHeaders(): EssenceHeadersInterface
    {
        return $this->headersFactory->getHeaders();
    }

    private function getRequestBody(): EssenceBodyInterface
    {
        return $this->bodyFactory->getRequestBody();
    }

    public static function instantiate(): EssenceRequestFactoryInterface {
        // TODO: Implement instantiate() method.
    }
}