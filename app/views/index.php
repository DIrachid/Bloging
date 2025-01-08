<?php 

$title = "Bloging";

ob_start();
?>
<h1>nice day</h1>
<p>THAT is page to index</p>
<?php echo PHP_VERSION ?>

<?php $content = ob_get_clean() ?>

<?php include __DIR__ . '/master/main.php'; ?>