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



    if ($choice == 0) {
        echo "Au revoir 👋\n";
        break;
    }

    if ($choice == 1) {

        echo "Titre: "; $titre = trim(fgets(STDIN));
        echo "Auteur: "; $auteur = trim(fgets(STDIN));
        echo "ISBN: ";$isbn = trim(fgets(STDIN));
        echo "is_dispo: ";$is_dispo = trim(fgets(STDIN));


        $book = new Book($titre, $auteur, $isbn, 1 ,$is_dispo );
        $library->AjouterLivre($book);

        echo "✔ Livre ajouté\n";
    }}

   