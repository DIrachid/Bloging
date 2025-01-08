<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>
<body>
<body>
    <?php require_once 'navbar.php' ?>
    <div class="container">
        <?php echo isset($content) ? $content : 'error' ?>
    </div>
    <?php require_once 'footer.php';?>
</body>
</html>