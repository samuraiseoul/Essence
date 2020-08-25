<?php


namespace Essence\Http\Messages\Body\Request;


final class EssencePostRequestBody extends EssenceMultipleResourceRequestBody {

    private EssencePostParametersInterface $postParameters;

    private string $contents;

    /**
     * @param EssencePostParametersInterface $postParameters
     * @param string $contents
     */
    public function __construct(EssencePostParametersInterface $postParameters, string $contents) {
        $this->postParameters = $postParameters;
        $this->contents = $contents;
    }

    public function getContents(): string {
        return $this->contents;
    }

    public function getPostParameters(): EssencePostParametersInterface {
        return $this->postParameters;
    }
}