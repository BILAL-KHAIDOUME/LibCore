<?php

require_once __DIR__ . "/../entities/Connexion.php";
require_once __DIR__ . "/../entities/Member.php";

class MemberRepository {

    private $conn;

    public function __construct() {

        $database = new Database();
        $this->conn = $database->connect();

    }

    // Ajouter membre
    public function add($member) {

        $sql = "INSERT INTO members(nom, email, type)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            $member->getNom(),
            $member->getEmail(),
            $member->getType()

        ]);

    }

    public function getAll() {

        $sql = "SELECT * FROM members";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}