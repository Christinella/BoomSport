<?php

namespace src\Services;

trait Hydratation
{

  public function __construct(array $data = [])
  {
    $this->hydrate($data);
  }
  
  public function __set($name, $value)
  {
    $this->hydrate([$name => $value]);
  }

  private function hydrate(array $data): void
  {
  
    foreach ($data as $key => $value) {
      $parts = explode('_', $key);
      $setter = 'set';

      foreach ($parts as $part) {
        $setter .= ucfirst(strtolower($part));
      }

      if (method_exists($this, $setter)) {
        $this->$setter($value);
      }
    }
  }

  // public function __serialize(): array
  // {
  //   $class = new \ReflectionClass(get_class($this));

  //   $ObjToArray = [];
  //   foreach ($class->getMethods(\ReflectionMethod::IS_PUBLIC) as $methode) {
  //     $nomMethode = $methode->getName();
  //     if (strpos($nomMethode, 'get') === 0) {
  //       // Vérifie si le nom de la méthode commence par 'get'
  //       $ObjToArray[ltrim('get',$nomMethode)] = $this->$nomMethode();
  //     }
  //   }
  //   return $ObjToArray;
  // }

  // public function __unserialize(array $data): void
  // {
  //   $this->hydrate($data);
  // }
}