
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
    $choice = (int) trim(fgets(STDIN));

    if ($choice == 0) {
        echo "Au revoir \n";
        break;
    }

   
    if ($choice == 1) {

        echo "Titre: ";$titre = trim(fgets(STDIN));

        echo "Auteur: ";$auteur = trim(fgets(STDIN));

        echo "ISBN: ";$isbn = trim(fgets(STDIN));

         echo "is_dispo: ";$is_dispo = trim(fgets(STDIN));

        $book = new Book($titre, $auteur, $isbn, 1 ,$is_dispo );
        $library->addBook();

        echo "✔ Livre ajouté\n";
    }

  
    if ($choice == 2) {
   
        echo "nom: ";$nom = trim(fgets(STDIN));
        echo "prenom: ";$prenom = trim(fgets(STDIN));
        echo "dateC: ";$dateC = trim(fgets(STDIN));
        echo "role_id: ";$role_id = trim(fgets(STDIN));


        $member = new Member($nom, $prenom, $dateC, $role_id);
        $library->ListedeLivre();


        echo "✔ Membre ajouté\n";
    }

    if ($choice == 3) {

        $books = $library->ListedeLivre();

        echo "\n LISTE LIVRES\n";

      foreach ($books as $b) {

    echo "Titre: " . $b->getTitre() . "\n";
    echo "Auteur: " . $b->getAuteur() . "\n";
    echo "ISBN: " . $b->getIsbn() . "\n";
    echo "Disponible: " . $b->getDisponible() . "\n";

    echo "---------------------\n";
}
    }

}