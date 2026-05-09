<?php

require_once "Library.php";

$library = new Library();

while (true) {



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

   