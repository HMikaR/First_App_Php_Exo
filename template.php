<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link href="style.css" rel="stylesheet"/>
        <title>Appshop</title>
    </head>
    <body>
    <?php 
        $nbProducts = 0;
        if(!isset($_SESSION["products"])||empty($_SESSION["products"])){ //Affiche 0 si panier vide
            $nbProducts = 0;
        } else{ //Sinon compte le nb de produits dans le panier
            foreach($_SESSION["products"] as $index => $product){
                $nbProducts+=$product["qtt"];
            }
        }
    ?>
        <div id="navbar">
            <div id="nav-content">
                <span id="shop"><b>Appshop</b></span>
                <span>Nombre de produits dans le panier : <?=$nbProducts?></span>
            </div>
            <nav>
                <ul id="menu">
                    <li><a href="index.php">PRODUITS</a></li>
                    <li><a href="recap.php">PANIER</a></li>
                </ul>
            </nav>
        </div>
        <div id="container">
            <?= $content ?>
        </div>
        <?php     
            if(isset($_SESSION["msg"])&&!empty($_SESSION["msg"])){
                echo "<div id='msg'><p>".$_SESSION["msg"]."</p></div>";
                unset($_SESSION["msg"]);
            }
        ?>
        <script> // code JS pour afficher un message 
            let msg=document.getElementById("msg")
            setTimeout(function(){
                msg.innerHTML=""
            }, 4000)
        </script>
    </body>
</html>