<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Document</title>
</head>

<?php include 'includes/header.php'; 
    if(!isset($_SESSION['userID'])){
        echo '<script>window.location.replace("inloggen.php");</script>';
    }else{
        $query = 'SELECT Gebruikersnaam FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam AND Verkoper = 1';
        $sql = $dbh->prepare($query);
        $sql->execute(['gebruikersnaam' => $_SESSION['userID']]);
        $resultaat = $sql->fetch();
    
        if(!$resultaat){
            echo '<script>window.location.replace("profiel.php");</script>';
        }
    }
?>

<body>
    <h1 class="text-center">Hoofd categorie</h1>
    <form method="POST" action="sub_cat.php">
        <?php include 'includes/categorieen.php'; ?>
        <div class="container text-center">
        <button type="submit" class="btn btn-primary mb-5" name="Sumbit">Volgende stap</button>
        </div>
    </form>
</body>
<?php include 'includes/footer.php';?>

</html>