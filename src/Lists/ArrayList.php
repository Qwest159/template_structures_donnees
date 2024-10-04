<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Lists;

use Exception;
use InvalidArgumentException;
use phpDocumentor\Reflection\Types\Void_;

class ArrayList implements ListInterface
{
    protected array $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    public function __toString(): string
    {
        return json_encode($this->elements, JSON_PRETTY_PRINT);
    }

    public function push(mixed $element = null): void
    {
        if (is_string($element)) {
            throw new InvalidArgumentException("pas de lettre");
        }
        $this->elements[] = $element;
    }

    public function get(int $index): mixed
    {

        if (!isset($this->elements[$index])) {
            throw new Exception("get pas possible : index hors limites");
        }
        return $this->elements[$index];
    }

    public function set(int $index, mixed $element): void
    {
        if (!isset($this->elements[$index])) {
            throw new Exception("set pas possible : index hors limites");
        }
        $this->elements[$index] = $element;
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    public function includes(mixed $element): bool
    {
        return in_array($element, $this->elements);
    }

    public function isEmpty(): bool
    {
        return (count($this->elements) === 0) ? true : false;
    }

    public function indexOf(mixed $element): int
    {
        if (!isset($this->elements[$element])) {
            throw new Exception("get pas possible : index hors limites");
        }
        for ($i = 0; $i < count($this->elements); $i++) {
            if ($this->elements[$i] === $element) {
                return $i;
            }
            if ($i === count($this->elements)) {
                return -1;
            }
        }
    }
    public function remove(int $index): void
    {
        if (!isset($this->elements[$index])) {
            throw new Exception("remove : index hors limites");
        }
        array_splice($this->elements, $index, 1);
    }

    public function size(): int
    {
        return count($this->elements);
    }

    public function toArray(): array
    {
        return $this->elements;
    }
}
