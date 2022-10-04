<?php
    date_default_timezone_set('Europe/Paris');
    $host='localhost';
    $port=3306;
    $dbname='cafe';
    $user='root';
    $pwd='';
    $date = date("Y-m-d H:i:s");

  try{
    $newBD= new PDO("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
  } catch(PDOException $e){
    die('Erreur de connexion :'.$e->getMessage());
  }

  $query = $newBD->query("SELECT * FROM produits"); 
  $products = $query->fetch();
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Commander</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  </head>
  <body id="cont">
    <nav class="ong">
        <div class="onglets">
            <a href="index.html">Accueil</a>
            <a href="commande.php">Commander</a>
            <a href="gestion.php">Voir les commandes</a>
            <a href="add.php">Ajouter/Supprimer des produits</a>
          </div>
      </nav>
    <div class="container">
      <form method="post" action="com.php">
        <label for="name">Prénom</label>
        <input
          type="text"
          id="prenom"
          name="prenom"
          placeholder="Prénom..."
        />

        <div class="hide col" id="name">
          Veuillez rentrer votre prenom !
        </div>

        <label for="name">Nom</label>
        <input
          type="text"
          id="nom"
          name="nom"
          placeholder="Nom..."
        />

        <div class="hide col" id="lname">
          Veuillez rentrer votre nom !
        </div>

        <label for="choix">Votre choix </label>
          <select id="choix" name="choix">
            <?php 
              while ($product = $query->fetch()) {
                echo "<option value=\"" . $product["id"] . "\">" . $product["nom"] . "</option>";
              }
            ?>
          </select>
          
          <div class="hide col" id="choice">
            Indiquez le nombre souhaité !
          </div>

          <label for="quantite">Quantité</label>
          <input
            type="number"
            min="1"
            id="quantite"
            name="quantite"
            placeholder="Combien en voulez-vous..."
          />
  
          <div class="hide col" id="qttys">
            Indiquez le nombre souhaité !
          </div>

        <input type="submit" value="Submit" />
      </form>
    </div>
    <footer>
    </footer>
    <script src="main.js"></script>
  </body>
</html>