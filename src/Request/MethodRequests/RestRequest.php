<?php


namespace Essence\Request\MethodRequests;


use Essence\Exceptions\NotImplementedException;
use Essence\Http\Endpoint;
use Essence\Http\Methods\RestVerb;
use Essence\Http\RestVerbs;
use Essence\Request\Request;
use Essence\Request\RequestManagers\FormDataManager;
use Essence\Request\RequestManagers\HeaderManager;
use Essence\Request\RequestManagers\QueryParameterManager;

abstract class RestRequest extends Request
{
    /** @var HeaderManager */
    private $headerManager;

    /** @var QueryParameterManager */
    private $queryParameterManager;

    /** @var FormDataManager */
    private $formDataManager;

    public const VERB_REQUEST_MAP = [
        RestVerbs::GET => GetRequest::class,
        RestVerbs::POST => PostRequest::class,
        RestVerbs::PUT => PutRequest::class,
        RestVerbs::PATCH => PatchRequest::class,
        RestVerbs::DELETE => DeleteRequest::class
    ];

    final public function ensureEndpointCanHandleRestMethod(Endpoint $endpoint): void
    {
        $restVerbInterface = RestVerb::VERB_INTERFACE_MAP[$this->getRestVerb()];
        $implementsRestMethod = $endpoint instanceof $restVerbInterface;
        if(!$implementsRestMethod) { // No need to check if the method is implemented as it must be for the interface to be.
            throw new NotImplementedException("Endpoint does not implement required interface: {$this->getRestVerb()}!");
        }
    }

    final public function getHeaderManager() : HeaderManager
    {
        return $this->headerManager ?? $this->headerManager = new HeaderManager();
    }

    final public function getQueryParameterManager() : QueryParameterManager
    {
        return $this->queryParameterManager ?? $this->queryParameterManager = new QueryParameterManager();
    }

    final public function getFormDataManager() : FormDataManager
    {
        if(in_array($this->getRestVerb(), [RestVerbs::DELETE, RestVerbs::GET], true)) {
            trigger_error('Post bodies are meant to be meaningless for GET and DELETE requests but access was requested!', E_WARNING);
        }
        return $this->formDataManager ?? $this->formDataManager = new FormDataManager();
    }
}