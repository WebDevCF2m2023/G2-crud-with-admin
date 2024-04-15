<?php

if(isset($_GET['disconnect'])) administratorDisconnect();

if(isset($_GET['insert'])){

    if(isset($_POST['title'], $_POST['ourdesc'], $_POST['latitude'], $_POST['longitude'])){
        $title = strip_tags(trim($_POST['title']));
        $ourdesc = trim($_POST['ourdesc']);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];
        $result = addOurDatas($connect, $title, $ourdesc, $latitude, $longitude);
        if($result === true){
            header("Location: ./");
            die();
        }else $error = $result;
    }
    require "../view/private/admin.insert.html.php";
    die();
}

if(!empty($_GET['update']) && ctype_digit($_GET['update'])){
    $id = $_GET['update'];

    if(isset($_POST['title'], $_POST['ourdesc'], $_POST['latitude'], $_POST['longitude'])){
        $title = strip_tags(trim($_POST['title']));
        $ourdesc = trim($_POST['ourdesc']);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];
        $result = updateOurData($connect, $id, $title, $ourdesc, $latitude, $longitude);
        if($result === true){
            header("Location: ./");
            die();
        }else $error = $result;
    }

    $data = getOurDataById($connect, $id);
    if(is_string($data)) $message = $data;
    elseif(isset($data['error'])) $error = $data['error'];
    require "../view/private/admin.update.html.php";
    die();
}

if(!empty($_GET['delete']) && ctype_digit($_GET['delete'])){
    $id = $_GET['delete'];
    $data = deleteOurDataById($connect, $id);
    header("Location: ./");
    die();
}

$ourDatas = getAllOurdatas($connect);

if(is_string($ourDatas)) $message = $ourDatas;
elseif(isset($ourDatas['error'])) $error = $ourDatas['error'];

// chargement de la vue de l'accueil de l'administration
require "../view/private/admin.homepage.html.php";