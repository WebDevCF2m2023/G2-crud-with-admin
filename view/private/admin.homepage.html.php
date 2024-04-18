<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
</head>
<body>
    <h1>Admin Homepage</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil Admin</a></li>
            <li><a href="?insert">Ajouter une data</a></li>
            <li><a href="?disconnect">Déconnexion</a>
            
        </ul>
    </nav>
    <div class="content">
        <h2>Administration de nos datas</h2>
        <?php if(isset($message)): ?>
                <h3><?=$message?></h3>
        <?php elseif(isset($error)): ?>
                <h3 class="error"><?=$error?></h3>
        <?php else: ?>
                    <table>
                        <tr>
                            <th>idourdatas</th>
                            <th>title</th>
                            <th>ourdesc</th>
                            <th>latitude</th>
                            <th>longitude</th>
                            <th>Modifier</th>
                            <th>supprimer</th>
                        </tr>
            
                        <?php foreach($ourDatas as $crud): ?>
                            
                            <tr>
                            <td><?=$crud["idourdatas"]?></td>
                            <td><?=$crud["title"]?></td>
                            <td><?=$crud["ourdesc"]?></td>
                            <td><?=$crud["latitude"]?></td>
                            <td><?=$crud["longitude"]?></td>
                            <td><a href="?update=<?=$crud["idourdatas"]?>"><img src="img/update.png" width="25" height="25" alt="update" /></a></td>
                            <td><a href="?delete=<?=$crud["idourdatas"]?>"><img src="img/delete.png" width="25" height="25" alt="delete" /></a></td>
                            </tr>
                            <?php endforeach; ?>
                    </table>
        <?php endif; ?>
        <!-- modèle de tableau à remplir avec le foreach -->
    </div>
</body>
</html>