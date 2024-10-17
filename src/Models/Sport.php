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

    // Getter for ID_Sport
    public function getID_Sport():? int
    {
        return $this->ID_Sport;
    }

    // Setter for ID_Sport
    public function setID_Sport(int $ID_Sport): void
    {
        $this->ID_Sport = $ID_Sport; // Corrected property name
    }

    // Getter for name
    public function getName(): ?string
    {
        return $this->name;
    }

    // Setter for name
    public function setName(?string $name): void
    {
        $this->name = $name; // Corrected property name
    }

    // Getter for image
    public function getImage(): ?string
    {
        return $this->image;
    }

    // Setter for image
    public function setImage(?string $image): void
    {
        $this->image = $image; // Corrected property name
    }

    // Getter for description
    public function getDescription(): ?string
    {
        return $this->description;
    }

    // Setter for description
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
