<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; 
    ?>
    <title>Geblokkeerd</title>
</head>

<?php include 'includes/header.php'; 
    $gebruiker = $_GET['gebruiker'];
    $sql = $dbh->prepare("SELECT * FROM geblokkeerd WHERE Gebruiker=:gebruikersnaam");
    $sql->execute(['gebruikersnaam' => $gebruiker]);
    $geblokeerd = $sql->fetch(PDO::FETCH_ASSOC);
    $reden = $geblokeerd['Reden']
?>

<body>

        <div class="container text-center">
           <h1>U bent geblokkeerd om de volgende reden:</h1>
            <h2><?=$reden ?></h2>
        </div>

</body>

<?php include 'includes/footer.php'; ?>

</html>