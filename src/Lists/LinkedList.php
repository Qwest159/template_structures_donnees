<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Lists;

use Opmvpc\StructuresDonnees\Node;

class LinkedList implements ListInterface
{
    protected Node $head;
    protected int $size;

    public function __construct()
    {
        $this->head = new Node(null);
        $this->size = 0;
    }

    public function __toString(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }

    public function push(mixed $element): void
    {

        if ($this->size === 0) {
            $this->head->setElement($element);
        } else {
            $newNode = new Node($element);
            $current = $this->head;

            while ($current->getNext() !== null) {
                $current = $current->getNext();
            }

            $current->setNext($newNode);
        }
        $this->size++;
    }

    public function get(int $index): mixed
    {
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->getNext();
        }
        return $current->getElement();
    }
    public function set(int $index, mixed $element): void {}

    public function clear(): void {}

    public function includes(mixed $element): bool {}

    public function isEmpty(): bool {}

    public function indexOf(mixed $element): int {}

    public function remove(int $index): void {}

    public function size(): int
    {
        return $this->size;
    }

    public function toArray(): array
    {
        $current = $this->head;
        $array[] = $current->getElement();
        while ($current->getNext() !== null) {
            $current = $current->getNext();
            $array[] = $current->getElement();
        }
        return $array;
    }
}
