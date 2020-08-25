<?php


namespace Essence\Http\Messages\Body\Request;


interface EssenceMultipleResourceRequestBodyInterface extends EssenceHasResourceRequestBodyInterface {
    // TODO: Better Typing. Depends on the mime type sent so need to figure that out
//    public function getParts() : array;
}