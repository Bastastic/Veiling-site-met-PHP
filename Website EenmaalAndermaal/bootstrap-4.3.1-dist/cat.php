<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Document</title>
</head>

<?php include 'includes/header.php'; ?>
<body>
    <h1>Hoofd catogorie</h1>
    <form method="POST" action="sub_cat.php">
<?php include 'includes/categorieen.php'; ?> 
<button type="submit" name="Sumbit">Volgende stap</button>
    </form>
</body>
<?php include 'includes/footer.php';?>
</html>