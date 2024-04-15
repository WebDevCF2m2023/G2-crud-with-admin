<?php
// si on essaie de se connecter
if(isset($_GET['connect'])){

    // si on clique sur connexion
    if(isset($_POST['username'],$_POST['passwd'])){

        // on met dans une variable la tentative de connexion
        $connection = administratorConnect($connect,$_POST['username'],$_POST['passwd']);


        /*

        ON EST ICI

        */

        if($connection === true){
            header("Location: ./");
        }

    }

    // appel de la vue
    require "../view/public/connect.html.php";
    exit();
}

$ourDatas = getAllOurdatas($connect);

if(is_string($ourDatas)) $message = $ourDatas;
elseif(isset($ourDatas['error'])) $error = $ourDatas['error'];

// chargement de la vue de l'accueil
require "../view/public/homepage.html.php";