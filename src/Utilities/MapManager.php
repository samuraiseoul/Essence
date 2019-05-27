<?php

namespace Essence\Utilities;


use TypeError;

abstract class MapManager
{
    /** @var array */
    private $map;

    public function __construct(array $map) {
            $this->map = $map;
    }

    private function get(string $index, callable $typeValidator, string $errorMessage)
    {
        if (!isset($this->map[$index])) {
            return null;
        }
        if($typeValidator($this->map[$index])) {
            return $this->map[$index];
        }
        throw new TypeError($errorMessage);
    }

    final public function getAsString(string $index) : ?string {
        return $this->get($index, function($value) {
            return is_string($value);
        }, "The value at index, $index, could not be retrieved as a string. Value is: {$this->map[$index]}");
    }

    final public function getAsInt(string $index) : ?int {
        return $this->get($index, function($value) {}, "");
        $value = $this->get($index);
        $castedValue = (int)$value;
        if($castedValue === 0 && (string)$value !== (string)$castedValue) {
            throw new TypeError("Unable to get value, '$index', as an integer. '$value' can not be converted correctly.");
        }
        return $value !== null ? (int)$value : $default;
    }

    final public function getAsBool(string $index) : ?bool {
        return $this->get($index, function($value) {
            return $value === true || $value === false || $value === 'true' || $value === 'false' || $value === 0 || $value === 1;
        }, "The value at index, $index, could not be retrieved as a boolean. Value is: {$this->map[$index]}");
    }

    final public function getAsFloat(string $index) : ?float {
        return $this->get($index, function($value) {}, "");
        $value = $this->get($index);
        $castedValue = (float)$value;
        if($castedValue === 0 && (string)$value !== (string)$castedValue) {
            throw new TypeError("unable to get value, $index, as a float. $value can not be converted correctly.");
        }
        return $value !== null ? (float)$value : $default;
    }

    final public function getAsArray(string $index) : ?array {
        return $this->get($index, function($value) {}, "");
        $value = $this->get($index);
        if($value === null) {
            return $default;
        }
        if(is_array($this->get($index))) {
            return $this->get($index);
        }
        throw new TypeError("Unable to get $index as an array.");
    }

    final public function getObject(string $index, string $qualifiedClassName) : object {
        return $this->get($index, function($value) {}, "");
        if($this->get($index) instanceof $qualifiedClassName) {
            return $this->get($index);
        }
        throw new TypeError("Unable to get $index as an instance of $qualifiedClassName");
    }
}