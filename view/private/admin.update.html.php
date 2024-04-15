<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
</head>
<body>
    <h1>Admin Update</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil Admin</a></li>
            <li><a href="?insert">Ajouter une data</a>
            <li><a href="?disconnect">Déconnexion</a>
        </ul>
    </nav>
    <div class="content">
        <h2>Update d'une data</h2>
        <form action="" name="updateData" method="POST">
            <?php if(isset($message)): ?>
                <h3><?= $message ?></h3>
            <?php elseif(isset($error)): ?>
                <h3 class="error"><?= $error ?></h3>
            <?php endif; ?>
            <input type="text" name="title" placeholder="title" value="<?=$data['title'] ?? ''?>" required><br>
            <textarea name="ourdesc" placeholder="Description" cols="30" rows="10" required><?=$data['ourdesc'] ?? ''?></textarea><br>
            <input type="number" name="latitude" step="0.0000001" placeholder="latitude" value="<?=$data['latitude'] ?? ''?>" required><br>
            <input type="number" name="longitude" step="0.0000001" placeholder="longitude" value="<?=$data['longitude'] ?? ''?>" required><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>