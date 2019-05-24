<?php

namespace Essence\Response;

use Essence\Utilities\MapManager;

abstract class BaseResponse
{
    /** @var MapManager */
    protected $headers;

    /** @var ResponseFormat  */
    protected $body;

    /** @var int  */
    protected $status;

    // TODO: Status Code Enums, Header Object?
    public function __construct(ResponseFormat $body, int $status = 200, array $headers = [])
    {
        $this->body = $body;
        $this->status = $status;
        $this->headers = new class($headers) extends MapManager {
            private $startHeaders;

            public function __construct(array $startHeaders)
            {
                $this->startHeaders = $startHeaders;
                parent::__construct();
            }

            protected function prepareMapFunction() : array
            {
                return $this->startHeaders;
            }
        };
    }

    abstract public function renderBody() : string;

    final public function emit() : void
    {
        $this->emitHeaders();
        echo $this->renderBody();
    }

    private function emitHeaders() : void
    {

    }
}