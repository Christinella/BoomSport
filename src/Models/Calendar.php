<?php

namespace src\Models;

use src\Services\Hydratation;

final class Calendar{
    private $ID_User, $ID_Program, $days;
    use Hydratation;
    
    public function getID_User(): ?int{
        return $this->ID_User;
    }
    
    public function setID_User(?int $ID_User): void{
        $this->ID_User = $ID_User;
    }
    
    public function getID_Program(): ?int{
        return $this->ID_Program;
    }
    
    public function setID_Program(?int $ID_Program): void{
        $this->ID_Program = $ID_Program;
    }
    
    public function getDays(): ?array{
        return $this->days;
    }
    
    public function setDays(?array $days): void{
        $this->days = $days;
    }
}