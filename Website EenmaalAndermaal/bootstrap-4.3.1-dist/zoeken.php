<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <link rel="icon" href="../../../../favicon.ico">
    <title>Over ons</title>
</head>
<?php
     require 'php/connectDB.php'; 
    ?>


<?php
     include 'includes/header.php'; 
    ?>

<body style="overflow-x:hidden">
    <section id="team" class="pb-5">
        
        
        
        <div class="container">
            <br>
            <h2>Zoekresultaten</h2>



            <div class="row">
                <?php
                if(isset($_GET['cat']) && isset($_GET['zoeken'])){
                    $trefwoord = strval($_GET['zoeken']);
                    $cat = $_GET['cat'];
                    $sql = $dbh->prepare(
                        "SELECT voorwerp, voorwerpnummer, titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip 
                        FROM Voorwerp, Voorwerp_in_Rubriek 
                        WHERE Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
                        AND Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau =:cat
                        AND titel LIKE CONCAT('%', :trefwoord, '%')");  
                    $sql->execute(['cat' => $cat, 'trefwoord' => $trefwoord]);
                    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $aantal = $sql->rowCount();
                    if($aantal < 1){
                     echo '<p class="ml-4">Geen producten gevonden</p>';   
                    }
                    }
                    elseif(isset($_GET['cat'])){
                        $cat = $_GET['cat'];

                        $sql = $dbh->prepare(
                            "SELECT voorwerp, voorwerpnummer, titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip 
                            FROM Voorwerp, Voorwerp_in_Rubriek 
                            WHERE Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
                            AND Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau =:cat");  
                        $sql->execute(['cat' => $cat]);
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                    elseif (isset($_GET['zoeken'])){
                        $trefwoord = strval($_GET['zoeken']);
                        $sql = $dbh->prepare(
                            "SELECT voorwerpnummer, titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip 
                            FROM Voorwerp 
                            WHERE titel LIKE CONCAT('%', :trefwoord, '%')");
                        $sql->execute(['trefwoord' => $trefwoord]);
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $sql = $dbh->prepare(
                            "SELECT voorwerpnummer, titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip 
                            FROM Voorwerp");
                        $sql->execute();
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                    foreach ($result as $key => $value) {
                        $voorwerpnummer = $value['voorwerpnummer'];
                        $titel = $value['titel'];
                        $bescrhijving = $value['beschrijving'];
                        $startprijs = $value['startprijs'];
                        $looptijdeindedag = $value['looptijdeindedag'];
                        $dag = date_create($looptijdeindedag);
                        $dag = date_format($dag, "d-m-Y");
                        $looptijdeindetijdstip = $value['looptijdeindetijdstip'];

                        echo "<div class='col-xs-12 col-sm-12 col-md-6' style='padding-top: 20px; cursor: pointer'
                        onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . $voorwerpnummer . "';\">
                        <div class='image-flip' ontouchstart='this.classList.toggle('hover');'>
                            <div class='mainflip'>
                                <div class='frontside'>
                                    <div class='card'>
                                        <div class='card-body text-center'>
                                            <p><img class=' img-fluid' src='images/test.jpg' alt='advertentie afbeelding'>
                                            </p>
                                            <h4>$titel</h4>
                                            <p>$bescrhijving</p>
                                            <h5>€$startprijs</h5>
                                            <h6>Loopt af op $dag</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                ?>
            </div>
        </div>
    </section>
</body>
<?php include 'includes/footer.php'; ?>

</html>