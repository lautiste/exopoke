<?php
require_once "./Pokemon.php";
require_once "./PokemonFeu.php";
require_once "./PokemonEau.php";
require_once "./PokemonPlante.php";
require_once "./selection.php";

if (isset($_SESSION["pokemonTab"])) {
    $pokemonTab = $_SESSION["pokemonTab"];
} else {
    $pokemonTab = [];
    $_SESSION["pokemonTab"] = $pokemonTab;
}

$pikachu = new Pokemon("pikachu",50,100,"https://fr.wikipedia.org/wiki/Pikachu#/media/Fichier:Cosplay_of_Pikachu,_Fanime_2015_(18125488996).jpg");
$dracofeu = new PokemonFeu("dracofeu",25,150,"https://www.pokepedia.fr/Fichier:Dracaufeu-RFVF.png");
$aquali = new PokemonEau("Aquali",75,75,"https://www.pokepedia.fr/images/6/6b/Aquali-RFVF.png");


    function combat (Pokemon $pok1, Pokemon $pok2) {
        // $pok1=getNom();
        // $pok2=getNom();
        while (!$pok1->isDead() && !$pok2->isDead()) {
        $pok1->attaquer($pok2);
    //    var_dump ($pok2);
        if ($pok2->isDead()) {
            echo $pok1->getNom() . "is the winner";
            
        }else {
            $pok2->attaquer($pok1);
            if ($pok1->isDead()) {
                echo $pok2->getNom() . "is the winner";
            }}
    }};

    
// combat ($pikachu,$aquali);
// combat ($aquali,$dracofeu);

