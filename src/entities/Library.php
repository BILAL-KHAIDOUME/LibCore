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


    public function addBook() {

        $sql = "INSERT INTO books(titre, auteur, isbn, is_available)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $book->getTitre(),
            $book->getAuteur(),
            $book->getIsbn(),
            $book->getDisponible()
        ]);
    }

 
    public function ajouterMember(Member $member) {

        $sqlUser = "INSERT INTO users(nom, prenom, dateC)
                    VALUES (?, ?, ?)";

        $stmtUser = $this->conn->prepare($sqlUser);

        $stmtUser->execute([
            $member->getNom(),
            $member->getPrenom(),
            $member->getDateC()
        ]);

        $user_id = $this->conn->lastInsertId();

        $sqlMember = "INSERT INTO membres(role_id, user_id)
                      VALUES (?, ?)";

        $stmtMember = $this->conn->prepare($sqlMember);

        return $stmtMember->execute([
            $member->getRoleId(),
            $user_id
        ]);
    }


    public function ListedeLivre() {

        $sql = "SELECT * FROM books";
        $stmt = $this->conn->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];

        foreach ($rows as $row) {

            $book = new Book(
                $row['titre'],
                $row['auteur'],
                $row['isbn'],
                $row['is_available']
            );

            $books[] = $book;
        }

        return $books;
    }
}

