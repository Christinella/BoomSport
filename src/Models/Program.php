<?php

namespace src\Models;

use src\Services\Hydratation;

final class Program
{
    // Define properties with proper type hints
    private ?int $ID_Program = null;
    private ?string $name = null;
    private ?string $image = null;
    private ?int $ID_Sport = null;

    use Hydratation;

    // Getter and Setter for ID_Program
    public function getID_Program(): ?int
    {
        return $this->ID_Program;
    }

    public function setID_Program(int $ID_Program): void
    {
        $this->ID_Program = $ID_Program;
    }

    // Getter and Setter for name
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    // Getter and Setter for image
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    // Getter and Setter for ID_Sport
    public function getID_Sport(): ?int
    {
        return $this->ID_Sport;
    }

    public function setID_Sport(?int $ID_Sport): void
    {
        $this->ID_Sport = $ID_Sport;
    }
}
