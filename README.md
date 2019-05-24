Include the bootstrap which has the autoload then 

There is an interface per REST method, just implement it on the Endpoint object 
to have it be hittable. To use, make an anonymous Endpoint class that implements the 
desired REST verbs. Preware and Postware (Before and After middlewares) can also be
used by implementing the HasPreware and HasPostware interfaces. 

```php
new class() extends Endpoint implements Get {
    public function get(GetRequest $request): BaseResponse
    {
        return new JsonResponse(new class() extends ResponseFormat {
            public $realField = 'Real value';

            public $meaning = 42;
        });
    }
};
```

Currently all REST interface methods return an instance of BaseResponse, of which only
JsonResponse is built out. All BaseResponses take a ResponseFormat which have to define
the format that response objects will be in ensuring a consistent, reusable API.

This framework/library currently only is for the web lifecycle hook. 

It uses the built in 'routing' that php has by default using the relative path to a
file from the server root. This allows easy ability to use this as an api, while still
allowing other types of endpoints such as dynamically generated downloads, generated html
and normal static assets like javascript, images, and other html pages. 

Later non rest based lifecycle management is planned to be added.