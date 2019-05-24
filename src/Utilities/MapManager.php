<?php

namespace Essence\Utilities;


abstract class MapManager
{
    /** @var array */
    private $map;

    public function __construct() {
            $this->map = $this->prepareMapFunction();
    }

    abstract protected function prepareMapFunction() : array;

    private function get(string $index) {
        return $this->map[$index] ?? null;
    }

    final public function getAsString(string $index, ?string $default = null) : ?string {
        $value = $this->get($index);
        return $value !== null ? (string)$value : $default;
    }

    final public function getAsInt(string $index, ?int $default = null) : ?int {
        $value = $this->get($index);
        $castedValue = (int)$value;
        if($castedValue === 0 && (string)$value !== (string)$castedValue) {
            throw new \TypeError("Unable to get value, '$index', as an integer. '$value' can not be converted correctly.");
        }
        return $value !== null ? (int)$value : $default;
    }

    final public function getAsBool(string $index, ?bool $default = null) : ?bool {
        $value = strtolower($this->get($index));
        if($value === null) {
            return $default;
        }
        if(\in_array($value, ['true', '1'], true)) {
            return true;
        }if(\in_array($value, ['false', '0', 'null'], true)) {
            return false;
        }
        throw new \TypeError("Value passed for '$index' can not be gotten as a boolean. Only the following case insensitive values (1, true) will be accepted as true and (false, 0, null) as false.");
    }

    final public function getAsFloat(string $index, ?float $default = null) : ?float {
        $value = $this->get($index);
        $castedValue = (float)$value;
        if($castedValue === 0 && (string)$value !== (string)$castedValue) {
            throw new \TypeError("unable to get value, $index, as a float. $value can not be converted correctly.");
        }
        return $value !== null ? (float)$value : $default;
    }

    final public function getAsArray(string $index, ?array $default = null) : ?array {
        $value = $this->get($index);
        if($value === null) {
            return $default;
        }
        if(!\is_array($value)) {
            throw new \TypeError("Unable to get $index as an array.");
        }
        return $value ?? $default;
    }

    private function getJson(string $index, $default, bool $asArray = false){
        $value = $this->get($index);
        if($value === null) {
            return $default;
        }
        $json = json_decode($value, $asArray);
        if($json === null) {
            throw new \TypeError("Unable to convert value, $index, to valid JSON, please consult the documentation at http://php.net/manual/en/function.json-decode.php");
        }
        return $json;
    }

    final public function getJsonAsArray(string $index, ?array $default = null) : ?array {
        return $this->getJson($index, $default, true);
    }

    final public function getJsonAsObject(string $index, ?\stdClass $default = null) : ?\stdClass {
        return $this->getJson($index, $default);
    }
}