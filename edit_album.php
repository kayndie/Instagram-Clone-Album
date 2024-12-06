<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php 
if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
} 

$album_id = $_GET['album_id'];
$album = getAlbumByID($pdo, $album_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>Edit Album</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="album_name">Album Name</label>
            <input type="text" name="album_name" value="<?php echo $album['album_name']; ?>" required>
            <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>">
        </p>
        <input type="submit" name="editAlbumBtn" value="Update Album">
    </form>
</body>
</html>