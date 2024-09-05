<?php 

namespace src\Models;


use src\Services\Hydratation; 

class Users
{
    private $ID_User , $Pseudonym, $Email, $Password, $isAdmin ;

    use Hydratation;

    public function getID_User() : int 
    {
        return $this->ID_User;
    }
    public function setID_User() : int 
    {
        return $this->ID_User;
    }
    public function getPseudonym() : string
    {
        return $this->Pseudonym;
    }
    public function setPseudonym() : string
    {
        return $this->Pseudonym;
    }
    public function getEmail(): string
    {
        return $this->Email;
    }
    public function setEmail() : string
    {
        return $this->Email;
    }
    public function getPassword(): string
    {
        return $this->Password;
    }
    public function setPassword() : string
    {
        return $this->Password;
    }
    public function getisAdmin(): bool
    {
        return $this->Password;
    }
    public function setisAdmin() : bool
    {
        return $this->Password;
    }
}