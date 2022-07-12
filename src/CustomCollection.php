<?php

namespace UniqueCharactersCounterApp;

class CustomCollection implements \Iterator, \ArrayAccess, \Countable
{
    protected $position = 0;
    protected $container = [];

    public function __construct($array)
    {
        $this->position = 0;
        if (!is_null($array)) {
            $this->container = $array;
        }
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->container[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->container[$this->position]);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    public function count(): int
    {
        return count($this->container);
    }
}
