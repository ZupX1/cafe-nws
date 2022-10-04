<?php 
    $host='localhost';
    $port=3306;
    $dbname='cafe';
    $user='root';
    $pwd='';
   

    try{
        $newBD= new PDO("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
        echo "Connexion etablie";
    } catch(PDOException $e){
        die('Erreur de connexion :'.$e->getMessage());
    }

    if (isset($_POST["proname"])&&
        isset($_POST["prix"])){
            $insertion=$newBD->prepare("INSERT INTO produits VALUES(NULL,:nom,:prix)");
            $insertion->bindValue(":nom",$_POST["proname"]);
            $insertion->bindValue(":prix",$_POST["prix"]);
            $verification= $insertion->execute();
            if ($verification){
                echo"réussite";
            }else{
                echo "fail";
            }
        
        }else {
            echo "Une variable bug";
        }

        if (isset($_POST["delproname"])){
            $suppr=$_POST['delproname'];
            $datasuppr="DELETE FROM produits WHERE id = $suppr";
            $newBD->prepare($datasuppr)->execute(); 
        }

        header('Location:add.php')

?>