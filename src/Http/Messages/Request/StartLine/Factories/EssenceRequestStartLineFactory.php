<?php


namespace Essence\Http\Messages\Request\StartLine\Factories;


use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLine;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use Essence\Http\Messages\Request\StartLine\RequestTarget;

final class EssenceRequestStartLineFactory implements RequestStartLineFactory
{
    /** @var EssenceRequestStartLine */
    private $startLine;

    /** @var RequestTargetFactory */
    private $requestTargetFactory;

    public function getStartLine(): RequestStartLine
    {
        return $this->startLine ?? $this->startLine = $this->createStartLine();
    }

    private function getMethod() : string {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getTarget() : RequestTarget {
        return $this->requestTargetFactory->getRequestTarget();
    }

    private function getVersion() : string {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    /**
     * @return EssenceRequestStartLine
     */
    private function createStartLine(): EssenceRequestStartLine
    {
        if($this->startLine) {
            throw new BadMethodCallException("The start line has already been created!");
        }
        return new EssenceRequestStartLine($this->getMethod(), $this->getTarget(), $this->getVersion());
    }

}