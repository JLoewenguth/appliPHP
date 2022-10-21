<?php
    session_start();

    if(isset($_POST['submit'])){        //recherche la clé 'submit'
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){    //check sanity

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            $Message = urlencode("</br></br>Liste mise à jour.");       //message en cas de nouvelles données
            $_SESSION['products'][] = $product;                         //enregistrement produit
        }   else{
            $Message = urlencode("</br></br>Données non valides.");     //message en cas de données invalides
        }
    }

    header("Location:index.php?Message=".$Message);
    die;       //retour à l'index
?>