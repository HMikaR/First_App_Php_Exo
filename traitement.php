
<?php 

session_start();
if (isset($_GET['action'])){

    switch ($_GET['action']){

        case "add":
            if(isset($_POST['submit'])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); 
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if($name && $price && $qtt){

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];

                    $_SESSION['products'][] = $product;
                    $_SESSION["msg"] = "Produit(s) ajouté(s)";

                } else{
                    $_SESSION["msg"] = "Erreur - Veuillez réessayer.";
                }

            }
            break;
            // header("Location:index.php");
            // die();

        case "viderAll":
            unset($_SESSION["products"]);
            header("Location:recap.php");
            break;

        case "delete":
            if(isset($_SESSION['products'][$id])){
                $_SESSION["message"] = "Le produit ".$_SESSION['products'][$id]['name']." a été supprimé !";
                unset($_SESSION['products'][$id]);
            }
            header("Location:recap.php");
            die();

        case "addproduct":
            if(isset($_SESSION['products'][$id])){
                $_SESSION['products'][$id]['qtt'] += 1;
                $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['qtt'] * $_SESSION['products'][$id]['price'];
            }
            header("Location:recap.php");
            die();

        case "minusproduct":
            if(isset($_SESSION["products"][$id])){
                if($_SESSION["products"][$id]["qtt"]==1){
                    $_SESSION["msg"] = "Le produit a été supprimé du panier.";
                    unset($_SESSION["products"][$id]);
                }else{
                    $_SESSION["products"][$id]["qtt"]-=1;
                    $_SESSION["products"][$id]["total"]=$_SESSION["products"][$id]["qtt"]*$_SESSION["products"][$id]["price"];
                }
            }
            header("Location:recap.php");
            die();
    }
}
header("Location:index.php");
die();
?>
