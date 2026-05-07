<?php

class Livre {

    private $titre;
    private $auteur;
    private $isbn;

    public function __construct($titre, $auteur, $isbn) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->isbn = $isbn;
    }

    public function getTitre() {  return $this->titre;  }
    public function getAuteur() { return $this->auteur; }
    public function getIsbn() { return $this->isbn; }

    public function setTitre($titre) { $this->titre =$titre ; }
    public function setAuteur($auteur) { $this->auteur =$auteur ; }
    public function setIsbn($isbn) { $this->isbn =$isbn ; }

}






















//   class Catalogue {
//     private $livres = [];

//     public function ajouterLivre(Livre $livre) {
//         $this->livres[] = $livre;
//     }
//   }
//     public function afficherLivres() {
//    foreach ($this->livres as $livre) {

//     echo $livre->getTitre() . "\n"
//        . $livre->getAuteur() . "\n"
//        . $livre->getIsbn() . "\n";
// }
//     }
// }




  