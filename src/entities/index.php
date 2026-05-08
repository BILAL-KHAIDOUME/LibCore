<?php

// ✅ Afficher TOUTES les erreurs PHP dès le début
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/Connexion.php";   // ✅ même dossier
require_once __DIR__ . "/Book.php";
require_once __DIR__ . "/Member.php";
require_once __DIR__ . "/Library.php";

// connexion
$db   = new Database();
$conn = $db->connect();

// library
$library = new Library($conn);

// ajouter livre
$book = new Livre("PHP", "Amine", "12345");
$library->ajouterLivre($book);

// ajouter member
$member = new Member("Yassine", "yassine@gmail.com", "Etudiant");
$library->ajouterMember($member);

// afficher livres
echo "<pre>"; // ✅ pour afficher proprement dans le navigateur
$library->afficherLivres();
echo "</pre>";

?>

