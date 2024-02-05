<?php   
session_start();
$listPokemon =$_SESSION["pokemonTab"];



$pikachu = new Pokemon("pikachu",50,100,"https://fr.wikipedia.org/wiki/Pikachu#/media/Fichier:Cosplay_of_Pikachu,_Fanime_2015_(18125488996).jpg");
$dracofeu = new PokemonFeu("dracofeu",25,150,"https://www.pokepedia.fr/Fichier:Dracaufeu-RFVF.png");
$aquali = new PokemonEau("Aquali",75,75,"https://www.pokepedia.fr/images/6/6b/Aquali-RFVF.png");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




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

<div id="formulaire">

<form method="get" action="combat.php">
  <label for="pokemon1">Sélectionnez le premier Pokémon :</label>
  <select id="pokemon1" name="pokemon1" required>
    <?php
      foreach ($_SESSION['pokemon'] as $pokemon) {
        echo "<option value='{$pokemon->getName()}'>{$pokemon->getName()}</option>";
      }
    ?>
  </select><br>

  <label for="pokemon2">Sélectionnez le deuxième Pokémon :</label>
  <select id="pokemon2" name="pokemon2" required>
    <?php
      foreach ($_SESSION['pokemon'] as $pokemon) {
        echo "<option value='{$pokemon->getName()}'>{$pokemon->getName()}</option>";
      }
    ?>
  </select><br>

  <input type="submit" value="Valider">
</form>

</div>
<?php foreach ($pokemonTab as $pokemon) : ?>
 
 
 <p>
     <?php
     if (isset($pokemon)) :
         echo $pokemon->getName();
     endif;
     ?>
 </p>

 <img src=<?php echo '"' . $pokemon->getUrlImage() . '"' ?> alt="">

<?php endforeach; ?>
    </div  >
</body>

</html>