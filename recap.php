<?php  
    session_start();
?>

<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--CSS-->
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif produits</title>
</head>

<body>
    <h2>Récapitulatif des produits :</h2>

    <?php 
            //si la liste de produit est vide
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>",
                "<thread>",
                    "<tr>",
                        "<th> </th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thread>",
                "<tbody>";

                //affichage du tableau
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                    "<td>".($index+1)."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "</tr>";
                $totalGeneral += $product['total'];
            }

            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral,2,",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
            "</table>";
        }
    ?>
    <p><a href="index.php">Retour à la page des commandes</a></p>

</body>

</html>