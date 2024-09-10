<?php

namespace src\Models;

use src\Services\Hydratation;

final class Sport
{
    private int $ID_Sport;
    private string $name;

    use Hydratation;

    public function getID_Sport(): int
    {
        return $this->ID_Sport;
    }
    public function setID_Sport(int $ID_Sport): void
    {
      $this->Id = $ID_Sport;
    }
    public function setName(string $name): void
    {
      $this->Name = $name;
    }
}   