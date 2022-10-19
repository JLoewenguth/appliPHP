<?php  
    session_start();
?>

<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif produits</title>
</head>

<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>",
                "<thread>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thread>",
                "<tbody>";

                //affichage du tableau
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".$product['price']."</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".$product['total']."</td>",
                "</tr>";
            }

            echo "</tbody>",
                "</table>";
        }
    ?>

</body>

</html>