<php? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/pokemon.css">
  <title>Document</title>
</head>

<body>
  <a href="selection.php">go to selection</a>
<form method="get" action="#">
  <label for="nom">Nom du Pokémon :</label>
  <input type="text" id="nom" name="nom" required><br>
  <label for="hp">Points de vie :</label>
  <input type="number" id="hp" name="hp"><br>
  <label for="atk">Points d'attaque :</label>
  <input type="number" id="atk" name="atk"><br>
  <label for="urlImage">url de limage</label>
  <input type="text" name="urlImage">
  <label for="type">Type du Pokémon :</label>
  <select id="type" name="type">
    <option value="normal">Normal</option>
    <option value="feu">Feu</option>
    <option value="eau">Eau</option>
    <option value="plante">Plante</option>
  </select><br>
  <input type="submit" value="Créer le Pokémon">
</form>

<?php



require_once "./Pokemon.php";
require_once "./PokemonFeu.php";
require_once "./PokemonEau.php";
require_once "./PokemonPlante.php";
require_once "./selection.php";


if (isset($_GET['nom']) && isset($_GET['hp']) && isset($_GET['atk']) && isset($_GET['type'])&& isset($_GET['urlImage'])) {
  $nom = $_GET['nom'];
  $hp = $_GET['hp'];
  $atk = $_GET['atk'];
  $type = $_GET['type'];
  $urlImage = $_GET['urlImage'];
  $pokemon;
  $pokemonTab=[];

 if (isset($_SESSION["pokemonTab"])){
    $pokemonTab=$_SESSION["pokemonTab"];
  }else{
    $pokemonTab=[];
    $_SESSION["pokemonTAb"]= $pokemonTab;
  }

  switch ($type) {
    case 'feu':
      $pokemon = new PokemonFeu($nom, $hp, $atk,$urlImage);
      break;
    case 'eau':
      $pokemon = new PokemonEau($nom, $hp, $atk, $urlImage);
      break;
    case 'plante':
      $pokemon = new PokemonPlante($nom, $hp, $atk, $urlImage);
      break;
    default:
      $pokemon = new Pokemon($nom, $hp, $atk,$urlImage);
      break;
  }

  $_SESSION['pokemon'] = $pokemon;  

  if(isset($pokemon)){
    $pokemonTab[]=$pokemon;
    $_SESSION["pokemonTab"]=$pokemonTab;
    ?>
        <p> <?php echo $pokemon->getNom() ?></p>
        <img src= <?php
                 echo '"' . $pokemon->getUrlImage() . '"'
                 ?> alt="tof">
    <?php
    }}
?>
    <?php 
          foreach ($pokemonTab as $pokemon) { 
    ?>

        <p> 
            <?php
             echo $pokemon->getName() 
             ?> 
         </p>
        <img src= 
                 <?php
                    echo '"' . $pokemon->getUrlImage() . '"'
                 ?> 
                alt="">
    <?php
    }
    ?>

</body>

</html>
</body>
</html>