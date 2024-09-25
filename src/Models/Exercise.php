<?php

namespace src\Models;

use src\Services\Hydratation;


final class Exercise{
   private $ID_Exercise, $name, $description, $image,$serie, $ID_Program;
   use Hydratation;

   public function getID_Exercise(): int
   {
      return $this->ID_Exercise;
   }
   
   public function setName(?string $name): void
   {
      $this->name = $name;
   }
   
   public function getDescription(): ?string
   {
      return $this->description;
   }
   
   public function setDescription(?string $description): void
   {
      $this->description = $description;
   }
   
   public function getImage(): ?string
   {
      return $this->image;
   }
   
   public function setImage(string $image): void
   {
      $this->image = $image;
   }
   
   public function getSerie(): string
   {
      return $this->serie;
   }
   
   public function setSerie(string $serie): void
   {
      $this->serie = $serie;
   }
   
   public function getID_Program(): int
   {
      return $this->ID_Program;
    }
}