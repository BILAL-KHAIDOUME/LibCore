<?php

require_once "Connexion.php";
require_once "Book.php";
require_once "Member.php";

class Library {

    private $conn;

    public function __construct() {
        $database = new Connexion();
        $this->conn = $database->connect();
    }

    public function AjouterLivre(Book $book) {

        $sql = "INSERT INTO books(titre, auteur, isbn, is_available)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $book->getTitre(),
            $book->getAuteur(),
            $book->getIsbn(),
            $book->getDisponible()
        ]);
    }}
