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
        echo "Connexion etablie";
    } catch(PDOException $e){
        die('Erreur de connexion :'.$e->getMessage());
    }

    if (isset($_POST["prenom"])&&
        isset($_POST["nom"])&&
        isset($_POST["choix"])&&
        isset($_POST["quantite"]))
        {
            $insertion=$newBD->prepare("INSERT INTO commande(prenom,nom,choix,quantite) VALUES(:prenom,:nom,:choix,:quantite)");
            $insertion->bindValue(":prenom",$_POST["prenom"]);
            $insertion->bindValue(":nom",$_POST["nom"]);
            $insertion->bindValue(":choix",$_POST["choix"]);
            $insertion->bindValue(":quantite",$_POST["quantite"]);
            $verification= $insertion->execute();
            if ($verification){
                echo"réussite";
            }else{
                echo "fail";
            }      
        }
        header('Location:commande.php')

?>
