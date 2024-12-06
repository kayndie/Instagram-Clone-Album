<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php 
if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
} 

$album_id = $_GET['album_id'];
$album = getAlbumByID($pdo, $album_id);
$photos = getPhotosByAlbumID($pdo, $album_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $album['album_name']; ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1><?php echo $album['album_name']; ?></h1>

    <h2>Upload Photo</h2>
    <form action="core/handleForms.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="album_id" value="<?php echo $album_id; ?>">
        <p>
            <label for="photoDescription">Photo Description</label>
            <input type="text" name="photoDescription" required>
        </p>
        <p>
            <label for="image">Photo Upload</label>
            <input type="file" name="image" required>
        </p>
        <input type="submit" name="insertPhotoToAlbumBtn" value="Upload Photo">
    </form>

    <h2>Photos in this Album</h2>
    <div class="photos">
        <?php foreach ($photos as $photo) { ?>
            <div class="photoContainer">
                <img src="images/<?php echo $photo['photo_name']; ?>" alt="" style="width: 100%;">
                <div class="photoDescription">
                    <p><?php echo $photo['description']; ?></p>
                    <a href="core/handleForms.php?deletePhotoId=<?php echo $photo['photo_id']; ?>">Delete Photo</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>