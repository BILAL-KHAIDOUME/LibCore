<?php

class Member {

    private $nom;
    private $email;
    private $type; 

    public function __construct($nom, $email, $type) { 

        $this->nom   = $nom;
        $this->email = $email;
        $this->type  = $type; 
    }

    public function getNom()   { return $this->nom;   }
    public function getEmail() { return $this->email; }
    public function getType()  { return $this->type;  } // 

    public function setNom($nom)     { $this->nom   = $nom;   }
    public function setEmail($email) { $this->email = $email; }
    public function setType($type)   { $this->type  = $type;  } 
}

?>