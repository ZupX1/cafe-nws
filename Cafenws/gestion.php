<title>Dashboard Admin</title>
<script src="https://kit.fontawesome.com/ab98ebb4c8.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">
<nav class="ong">
        <div class="onglets">
            <a href="index.html">Accueil</a>
            <a href="commande.php">Commander</a>
            <a href="gestion.php">Voir les commandes</a>
            <a href="add.php">Ajouter/Supprimer des produits</a>
          </div>
      </nav>
<body id="admin">
    
<h1 class=h1>Gestion des commandes</h1>
<table>
    <tr>
        <td scope="row"><strong>ID</strong></td>
        <td><strong>Prénom</strong></td>
        <td><strong>Nom</strong></td>
        <td><strong>Produit</strong></td>
        <td><strong>Prix en €/u</strong></td>
        <td><strong>Quantité</strong></td>
        <td><strong>Validé ?</strong></td> 
        <td><strong>Heure de commande</strong></td>
    </tr>

<?php
$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=cafe', $user, $pass);
    $query = $dbh->query('SELECT 
            c.id id_commande,
            c.nom nom_commande, 
            c.prenom prenom_commande,
            p.nom nom_produit,
            p.prix prix_produit,
            c.quantite quantite_commande,
            c.valide valide_commande,
            c.heure heure_commande
        FROM commande AS c 
        INNER JOIN produits AS p
        ON c.choix = p.id');
    while($row = $query->fetch()){
        $row = array_map("utf8_encode", $row);

        if(isset($_GET['id_supp'])){
            $idi=$_GET['id_supp'];
            $datasupp="DELETE FROM commande WHERE id = $idi";
            $dbh->prepare($datasupp)->execute(); 
            header("Location:gestion.php");
        }

        if(isset($_GET['id_valid'])){
            $idis=$_GET['id_valid'];
            $dataup="UPDATE commande SET valide=1 WHERE id = $idis";
            $dbh->prepare($dataup)->execute(); 
            header("Location:gestion.php");
        } 
        
        if(isset($_GET['id_annul'])){
            $idis=$_GET['id_annul'];
            $dataup="UPDATE commande SET valide=0 WHERE id = $idis";
            $dbh->prepare($dataup)->execute(); 
            header("Location:gestion.php");
        }

        
        $id = $row['id_commande'];
        $name = $row['prenom_commande'];
        $lastname = $row['nom_commande'];
        $choix = $row['nom_produit'];
        $prix = $row['prix_produit'];
        $qtty = $row['quantite_commande'];
        $valid = $row['valide_commande'];
        $date = $row['heure_commande'];
        echo "<tr> 
        <td scope='row'>$id</td>
        <td>$name</td>
        <td>$lastname</td>
        <td>$choix</td>
        <td>$prix</td>
        <td>$qtty</td>";
        if ($valid == 0) {
           echo "<td>Non<a href='gestion.php?id_valid=".$id."' id='update'>&nbsp&nbsp&nbspCliquez pour valider</a></td>";
        }

        else {
            echo "<td>Oui<a href='gestion.php?id_annul=".$id."' id='update'>&nbsp&nbsp&nbspCliquez pour annuler</a></td>";
        }
        echo "<td>$date</td>
        <td><a href='gestion.php?id_supp=".$id."' id='delete'>Supprimer</a></td>
        </tr>";
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
</table>
</body>