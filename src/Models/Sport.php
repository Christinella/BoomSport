<?php

namespace src\Models;

use src\Services\Hydratation;

final class Sport
{
    private int $ID_Sport;
    private ?string $name;
    private ?string $image;
    private ?string $description;

    use Hydratation;


    public function getID_Sport():? int
    {
        return $this->ID_Sport;
    }


    public function setID_Sport(int $ID_Sport): void
    {
        $this->ID_Sport = $ID_Sport; 
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

  
    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
