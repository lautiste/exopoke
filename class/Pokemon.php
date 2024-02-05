<?php

class Pokemon {
  
  protected string $nom;
  protected int $hp;
  protected int $atk;

  protected string $urlImage;

    /*Constructeur de la classe pokemeon
  @param string $name the name of the pokemeon 
  @param int $HP santé healtpoint du poke 
  */


  public function __construct($nom, $hp, $atk, $urlImage ) {
    $this->nom = $nom;
    $this->hp = $hp;
    $this->atk = $atk;
    $this->urlImage = $urlImage;
  }


  public function getNom() {
    return $this->nom;
  }

  public function getHp() {
    return $this->hp;
  }

  public function getAtk() {
    return $this->atk;
  }
 

  public function setHp($hp)
    {
        if($hp> 0){
         $this->hp=$hp;
        }
        $this->hp=0;
    }

  public function isDead(): bool {
       
    if($this->hp==0) {
        return true;
    }
    return false;
}
  
  public function attaquer(Pokemon $p) {
    
    $coef = 1;
    if ($p instanceof PokemonFeu) {
      if ($this instanceof PokemonEau) {
        $coef = 2;
      } elseif ($this instanceof PokemonFeu || $this instanceof PokemonPlante) {
        $coef = 0.5;
      }
    } elseif ($p instanceof PokemonEau) {
      if ($this instanceof PokemonPlante) {
        $coef = 2;
      } elseif ($this instanceof PokemonEau || $this instanceof PokemonFeu) {
        $coef = 0.5;
      }
    } elseif ($p instanceof PokemonPlante) {
      if ($this instanceof PokemonFeu) {
        $coef = 2;
      } elseif ($this instanceof PokemonPlante || $this instanceof PokemonEau) {
        $coef = 0.5;
      }
    }

    $p->setHp(0);
    $p->setHp($p->getHp() - $this->atk * $coef);


    
    if ($p->isDead()) {
      $p->hp = 0; 
      echo $this->nom . " a vaincu " . $p->nom . "<br>";
    } else {
      echo $this->nom . " a infligé " . $this->atk * $coef . " points de dégâts à " . $p->nom;
    }

   
}





  /**
   * Get the value of urlImage
   */ 
  public function getUrlImage()
  {
   
  }

  /**
   * Set the value of urlImage
   *
   
   */ 
  public function setUrlImage($urlImage)
  {
    $this->urlImage = $urlImage;

    return $this;
  }
};