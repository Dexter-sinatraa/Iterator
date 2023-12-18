<?php
// Інтерфейс ітератора
interface IteratorInterface {
    public function hasNext();
    public function next();
}

// Інтерфейс агрегату
interface AggregateInterface {
    public function getIterator();
}

// Клас конкретного ітератора
class ConcreteIterator implements IteratorInterface {
    private $collection;
    private $index = 0;

    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    public function hasNext() {
        return $this->index < count($this->collection);
    }

    public function next() {
        $element = $this->collection[$this->index];
        $this->index++;
        return $element;
    }
}

// Клас конкретного агрегату
class ConcreteAggregate implements AggregateInterface {
    private $collection;

    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    public function getIterator() {
        return new ConcreteIterator($this->collection);
    }
}

// Використання паттерна Ітератор
$collection = new ConcreteAggregate(['Item 1', 'Item 2', 'Item 3']);
$iterator = $collection->getIterator();

while ($iterator->hasNext()) {
    echo $iterator->next() . "<br>";
}
