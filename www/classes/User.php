<?php
class User {
    public $email;
    public $nom;
    public $prenom;
    private $password;
    public $role;

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }
}