<?php
    $host='localhost';
    $port=3306;
    $dbname='cafe';
    $user='root';
    $pwd='';

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
      <form method="post" action="ajout.php">
        <label for="proname">Nom du produit</label>
        <input
          type="text"
          id="proname"
          name="proname"
          placeholder="Veuillez renseigner si possible la quantité en g ou cl du produit..."
        />

        <div class="hide col" id="name">Veuillez rentrer le nom du produit</div>

        <label for="prix">Prix</label>
        <input
          type="number"
          min="0.01"
          step="0.01"
          id="prix"
          name="prix"
          placeholder="prix du produit..."
        />

        <div class="hide col" id="price">Veuillez entrer un prix !</div>

        <input type="submit" value="submit" />
      </form>
    </div>

    <div class="container">
      <form method="post" action="ajout.php">
        <label for="delproname">Nom du produit à supprimer</label>
        <select id="delproname" name="delproname">
          <?php while ($product = $query->fetch()) {
                echo "<option value=\"" . $product["id"] . "\">" . $product["nom"] . "</option>";
              }
          ?>
        <input class="delete" type="submit" value="DELETE" />
      </form>
    </div>
    <footer></footer>
    <script src="main2.js"></script>
  </body>
</html>
