<?php 

namespace src\Models;


use src\Services\Hydratation; 

class Users
{
    private $ID_User , $pseudonym, $email, $password, $isAdmin;

    use Hydratation;

    public function getID_User() : int 
    {
        return $this->ID_User;
    }
    public function setID_User() : int 
    {
        return $this->ID_User;
    }
    public function getPseudonym() : ?string
    {
        return $this->pseudonym;
    }
    public function setPseudonym() : ?string
    {
        return $this->pseudonym;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail() : ?string
    {
        return $this->email;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword() : ?string
    {
        return $this->password;
    }
    public function getisAdmin(): bool
    {
        return $this->isAdmin;
    }
    public function setisAdmin() : bool
    {
        return $this->isAdmin;
    }
}