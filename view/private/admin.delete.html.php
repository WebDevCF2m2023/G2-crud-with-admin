<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Delete</title>
</head>
<body>
    <h1>Admin Delete</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil Admin</a></li>
            <li><a href="?insert">Ajouter une data</a></li>
            <li><a href="?disconnect">Déconnexion</a>       
        </ul>
    </nav>
    <div class="content">
        <h2>Delete d'une data</h2>
        <?php if(isset($error)): ?>
                <h3 class="error"><?=$error?></h3>
        <?php endif ?>
        <input type="text" name="title" placeholder="title" value="<?=$delete['title']?>" disabled><br>
        <textarea name="ourdesc" placeholder="Descrition" disabled><?=$delete['ourdesc']?></textarea><br>
        <input type="number" step="0.0000001" name="latitude" placeholder="latitude" value="<?=$delete['latitude']?>" disabled><br>
        <input type="number" step="0.0000001" name="longitude" placeholder="longitude" value="<?=$delete['longitude']?>" disabled><br>
        <a href="?delete=<?=$idDelete?>&ok"><button>Supprimer</button></a> | <a href="./"><button>Ne pas supprimer</button></a>

    </div>
</body>
</html>