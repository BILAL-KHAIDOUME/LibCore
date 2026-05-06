
<?php
class Livre{
    private $nom ;
    private $auteur ;
    private $type ;

 public function __construct($nom  ,$auteur ,$type) 
 {
    $this -> nom = $nom ;
    $this -> auteur = $auteur ;
    $this -> type = $type ;

 }

 
 public function getNom() {return $this -> nom ;}
 public function getAuteur() {return $this -> auteur ;}
 public function getType() {return $this -> type ;}


 public function setNom($nom) {$this -> nom =$nom ;}
 public function setAuteur($auteur) {$this -> auteur =$auteur ;}
 public function setType($type) {$this -> type =$type ;}

}

  class Catalogue {
    private $livres = [];

    public function ajouterLivre(Livre $livre) {
        $this->livres[] = $livre;
    }
    public function afficherLivres() {
        foreach ($this->livres as $livre) {
            echo $livre->getTitre() . " | "
               . $livre->getAuteur() . " | "
               . $livre->getIsbn() . "<br>";
        }
    }
}





  