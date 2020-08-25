<?php

namespace Essence\Http\Messages\Body\Response;

interface EssenceSingleResourceResponseBodyInterface extends EssenceBodyInterface {
    public function getContents() : string;
}