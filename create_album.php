<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php 
if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Album</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>Create a New Album</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="album_name">Album Name</label>
            <input type="text" name="album_name" required>
        </p>
        <input type="submit" name="createAlbumBtn" value="Create Album">
    </form>
</body>
</html>