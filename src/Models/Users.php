<?php
namespace src\Models;

use src\Services\Hydratation; 

class Users
{
    private $ID_User, $pseudonym, $email, $password, $isAdmin;

    use Hydratation;

    public function getID_User(): ?int 
    {
        return $this->ID_User;
    }

    public function setID_User(int $id): void 
    {
        $this->ID_User = $id;
    }

    public function getPseudonym(): ?string
    {
        return $this->pseudonym;
    }

    public function setPseudonym(string $pseudonym): void 
    {
        $this->pseudonym = $pseudonym;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void 
    {
        $this->password = $password;
    }

    public function getisAdmin(): bool
    {
        return $this->isAdmin ?? false; 
    }

    public function setisAdmin(bool $isAdmin): void 
    {
        $this->isAdmin = $isAdmin;
    }
}
