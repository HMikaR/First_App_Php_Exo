
<?php 
    session_start();
    ob_start();
?>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=add" method="post" enctype="multipart/form-data">
        <p>
            <label>
                Nom du produit : 
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit : 
                <input type="number" step= "0.01" name="price" min="0.01" >
            </label>
        </p>
        <p>
            <label>
                Quantité désirée : 
                <input type="number" name="qtt" step="1" min="1">
            </label>
        </p>
        <p> 
            <input  class ="indexbutton" type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
    <?php
    $content = ob_get_clean();
    require "template.php";
?>

