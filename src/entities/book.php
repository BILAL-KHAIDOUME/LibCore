<?php

class Book {

    private $titre;
    private $auteur;
    private $isbn;
    private $is_dispo;

    public function __construct($titre, $auteur, $isbn, $is_dispo ) {

        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->isbn = $isbn;
        $this->is_dispo = $is_dispo;

    }

    public function getTitre() {return $this->titre;}

    public function getAuteur() {return $this->auteur;}

    public function getIsbn() {return $this->isbn;}

    public function getDisponible() {return $this->is_dispo;}

}