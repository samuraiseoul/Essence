<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;

use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLine;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLineInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTargetInterface;

final class EssenceRequestStartLineFactory implements EssenceRequestStartLineFactoryInterface
{
    private ?EssenceRequestStartLineInterface $startLine = null;

    private EssenceRequestTargetFactoryInterface $requestTargetFactory;

    public function __construct(EssenceRequestTargetFactoryInterface $requestTargetFactory)
    {
        $this->requestTargetFactory = $requestTargetFactory;
    }

    public function getStartLine(): EssenceRequestStartLineInterface
    {
        return $this->startLine ?? $this->startLine = $this->createStartLine();
    }

    private function getMethod() : string {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getTarget() : EssenceRequestTargetInterface {
        return $this->requestTargetFactory->getRequestTarget();
    }

    private function getVersion() : string {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    private function createStartLine(): EssenceRequestStartLineInterface
    {
        if($this->startLine) {
            throw new BadMethodCallException('The start line has already been created!');
        }
        return new EssenceRequestStartLine($this->getMethod(), $this->getTarget(), $this->getVersion());
    }

}