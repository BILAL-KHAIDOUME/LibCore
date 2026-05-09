<?php
// member.php

class Member {

    private $nom;
    private $prenom;
    private $dateC;
    private $role_id;

    public function __construct($nom, $prenom, $dateC, $role_id) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateC = $dateC;
        $this->role_id = $role_id;

    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateC() {
        return $this->dateC;
    }

    public function getRoleId() {
        return $this->role_id;
    }

}