<?php

namespace src\Models;

use src\Services\Hydratation;

final class Program
{
    
    private ?int $ID_Program = null;
    private ?string $name = null;
    private ?string $image = null;
    private ?int $ID_Sport = null;

    use Hydratation;
   
    public function getID_Program(): ?int
    {
        return $this->ID_Program;
    }

    public function setID_Program(int $ID_Program): void
    {
        $this->ID_Program = $ID_Program;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getID_Sport(): ?int
    {
        return $this->ID_Sport;
    }

    public function setID_Sport(?int $ID_Sport): void
    {
        $this->ID_Sport = $ID_Sport;
    }
}
