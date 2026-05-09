<?php

require_once "Library.php";

$library = new Library();

while (true) {
    echo "====================\n";
    echo "LIBRARY MENU\n";
    echo "====================\n";
    echo "1 - Ajouter Livre\n";
    echo "2 - Ajouter Membre\n";
    echo "3 - Afficher Livres\n";
    echo "0 - Quitter\n";
    echo "====================\n";

       echo "Choisir option: ";
       $prompt =fgets(STDIN);
    $choice = (int) trim($prompt);

    if ($choice == 0) {
        echo "merci pour la visite  \n";
        break;
    }

    if ($choice == 1) {

        echo "Titre: "; $titre = trim(fgets(STDIN));
        echo "Auteur: "; $auteur = trim(fgets(STDIN));
        echo "ISBN: ";$isbn = trim(fgets(STDIN));
        echo "is_available: ";$is_available = trim(fgets(STDIN));


        $book = new Book($titre, $auteur, $isbn, 1 ,$is_available );
        $library->AjouterLivre($book);

        echo "✔ Livre ajouté\n";
    }



    if ($choice == 2) {

        $member = new Member("Amine", "Sakhri", "2026-05-09", 1);
        $library->addMember($member);

        echo "✔ Membre ajouté\n";
    }

    if ($choice == 3) {

        $books = $library->getBooks();

        echo "\n LISTE LIVRES\n";

      foreach ($books as $b) {

    echo "Titre: " . $b->getTitre() . "\n";
    echo "Auteur: " . $b->getAuteur() . "\n";
    echo "ISBN: " . $b->getIsbn() . "\n";
    echo "Disponible: " . $b->getDisponible() . "\n";

    echo "---------------------\n";
      }}





}

    
   