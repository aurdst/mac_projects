<?php 

namespace Calandar;

class Event {

    private $id;

    private $name;

    private $description;

    private $start;

    private $end;

    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getStart(): \DateTime{
        return \DateTime($this->start);
    }

    public function getEnd(): \DateTime{
        return \DateTime($this->end);
    }
}