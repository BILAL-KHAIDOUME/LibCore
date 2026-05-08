<?php

class Library {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // ajouter livre
    public function ajouterLivre($book) {

        $sql = "INSERT INTO books (titre, auteur, isbn, etat)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $book->getTitre(),
            $book->getAuteur(),
            $book->getIsbn(),
            "Disponible"
        ]);

        echo "Livre ajouté.\n";
    }

    // afficher livres
    public function afficherLivres() {

        $sql  = "SELECT * FROM books";
        $stmt = $this->conn->query($sql);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // ✅ fetch explicite

        if (empty($rows)) {
            echo "Aucun livre trouvé.\n";
            return;
        }

        foreach ($rows as $book) {
            echo $book['titre']  . " | ";
            echo $book['auteur'] . " | ";
            echo $book['isbn']   . " | ";
            echo $book['etat']   . "\n";
        }
    }

    // ajouter member
    public function ajouterMember($member) {

        // ✅ "members" corrigé en "membres" (nom de la vraie table)
        $sql = "INSERT INTO membres (nom, email, type, role_id)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $member->getNom(),
            $member->getEmail(),
            $member->getType(),
            1   // role_id par défaut (à adapter selon votre logique)
        ]);

        echo "Membre ajouté.\n";
    }
}