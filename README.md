# Essence

A php request lifecycle framework built with type safety in mind along with avoidance 
of magic methods. It works with vanilla php instead of against it to enable easy ide
and static analysis as well as no hard to trace 'gotchas'. 

You will find no router here, simply vanilla php's built in file system based routing. 
This allows easy routing to REST endpoints that Essence can handle.
In addition to REST endpoints, by utilizing PHPs built in filesystem based routing there is an
obvious spot for static files to belong as well as other scripts such as 
dynamically generated downloads. 
In the future to better support things like dynamic download scripts, non REST based endpoints
are planning to be supported.

Essence supports middleware for both before and after the request that are named more clearly
Preware and Postware. Simply implement the HasPreware or HasPostware interfaces on an endpoint
to get all the great benefits of middleware!

## Getting Started

### Prerequisites

Your local machine will need: 

 * Docker
 * Docker Compose
 * Git

After, clone this repository and run:

```
docker-compose up
```

this will run the tests and ensure that everything is in working order!

## Code Example

A basic working example of a file that uses Essence for its lifecycle would be:

```php
<?php

require './vendor/autoload.php';

use Essence\Essence;
use Essence\Http\Endpoints\Methods\Get;
use Essence\Http\Messages\Headers\EssenceHeader;
use Essence\Http\Messages\Request\Wrapper\RequestWrapper;
use Essence\Http\Messages\Response\Wrapper\EssenceResponseWrapper;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

Essence::define(new class(42) implements Get {
    /** @var int */
    private $dependencyInjectedInteger;

    public function __construct(int $dependencyInjectedInteger)
    {
        $this->dependencyInjectedInteger = $dependencyInjectedInteger;
    }

    public function get(RequestWrapper $requestWrapper): ResponseWrapper
    {
        $userId = $requestWrapper->queryParameterAsInt('userId');
        $header = new EssenceHeader('X-Essence', 'Vanilla PHP Framework');

        $responseWrapper = new EssenceResponseWrapper();
        $responseWrapper->setRawBody("Random ass stuff plus the dependency injected integer, {$this->dependencyInjectedInteger}! Now featuring the userId param, $userId!");
        $responseWrapper->addHeader($header);
        return $responseWrapper;
    }
});
```

## Roadmap / Future Development 

Currently this project only spells out the very basic core of a framework. In the future the plan
is to add extensive tests, as well as create a more robust project structure for using 
Essence's request lifecycle framework. Currently the proposed structure is:

```
/root
    - /app
        - /Middleware
            - /Preware
            - /Postware
        - Services
        - ResponseFormats
        - Endpoints
        - Views (If using Twig or something to return responses)
        - DB
    - public
        - api
            - endpoints
        - static
            - img
            - css (dist)
            - js (dist)
            - html (dist)
    - js(src)
    - vendor
        - Essence
    - tests
    - phpunit.xml
    - README.md
    - composer.json
```

It will be nice to add some kind of dependency builder to the project structure for easy 
inclusion and use out of the box of popular frameworks for things like DB interaction,
Dependency Injection, Queues, and Command Line tooling. One of the nice things about Essence
is that it starts out needing the bare minimum, however, without an easy way to start projects
in it, no one will start using it. 

Additionally adding some kind of `.htaccess` magic or another for pretty urls seems like an 
important step to being easily consumable. 

## Contributing

To contribute, simply make an issue and pull request! As long as the code looks good and the 
issue makes sense to address, I will merge it in! 

## Authors

* **Scott Lavigne** - [Website](http://www.scottlavigne.com) - [LinkedIn](https://www.linkedin.com/in/scottlavigne/) 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* [Purplebooth Readme Guide](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2)
* [Akash Nimare's Readme Guide](https://medium.com/@meakaakka/a-beginners-guide-to-writing-a-kickass-readme-7ac01da88ab3)
