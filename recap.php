<?php 
    session_start();
    ob_start();
   if (!isset($_SESSION['products']) || empty($_SESSION['products'])){
    echo "<p>Aucun produit en session 😕</p>";
   }
   else {
    echo "<table>",
            "<thead>",
                "<tr>",
                    "<th>&nbsp # &nbsp</th>",
                    "<th>&nbsp Nom &nbsp</th>",
                    "<th>&nbsp Prix &nbsp</th>",
                    "<th>&nbsp Quantité &nbsp</th>",
                    "<th>&nbsp Total &nbsp</th>",
                "</tr>",
            "</thead>",
            "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>&nbsp". $index. "</td>",
                        "<td>&nbsp". $product['name']. "</td>",
                        "<td>&nbsp". number_format($product['price'], 2, ",","&nbsp;"). "&nbsp;€</td>",
                        "<td>&nbsp". $product['qtt']. "</td>",
                        "<td>&nbsp". number_format($product['total'], 2, ",","&nbsp;"). "&nbsp;€</td>",
                    "</tr>";
                    $totalGeneral += $product['total'];
            }
            
    echo    "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
    "</tbody>",
    "</table> <button class='button'><a href='traitement.php?action=viderAll'>Vider le panier</button>";
   } 
$content = ob_get_clean();
    require "template.php";
   ?>
</body>
</html>
