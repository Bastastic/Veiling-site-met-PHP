

<?php
require_once('php/connectDB.php');
session_start();
if (isset($_SESSION['userID'])) {
    $gebruikersnaam = $_SESSION['userID'];
    $sql = $dbh->prepare("SELECT Voornaam, Achternaam, Geactiveerd
                    FROM Gebruiker
                    WHERE Gebruikersnaam = :gebruikersnaam");
    $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
    $gebruiker = $sql->fetch(PDO::FETCH_ASSOC); 
    $voornaam = $gebruiker['Voornaam'];
    $achternaam = $gebruiker['Achternaam'];

    $sql = $dbh->prepare("SELECT * FROM geblokkeerd WHERE Gebruiker=:gebruikersnaam");
    $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
    $geblokkeerd = $sql->fetch(PDO::FETCH_ASSOC);
    if($geblokkeerd){
        session_destroy();
        header('Location: ../geblokkeerd.php?gebruiker=' . $gebruikersnaam);
    }


    if($gebruiker['Geactiveerd'] == 0){
        // hier controleren we of de gebruiker Geactiveerd is, als dit het geval is zal je alles kunnen doen. anders kom je steeds terug op de pagina 
        // om een mail te versturen naar je zelf met een code. 
        if(basename($_SERVER['PHP_SELF']) != 'mailversturen.php' && basename($_SERVER['PHP_SELF']) != 'mailverstuurd.php' && basename($_SERVER['PHP_SELF']) != 'geblokkeerd.php'){
            header('Location: mailversturen.php');
        }
    }
}


?>
<header>
<meta http-equiv="refresh" content="1200;url=php/logout.php" />
    <div id="Top-Header" style="background-color: #ff814f">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md static-top">
                <div class="row w-100">
                    <div class="col-6">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/LogoWit.png" style="width: 120px" alt="">
                        </a>
                    </div>
                    <div class="col-5 align-self-center">
                        <div
                            class="row float-right justify-content-between justify-content-end flex-lg-row flex-md-row flex-column flex-column">

                         <!-- Hier controleert die of de gebruikersnaam bekend is. In dit geval zal die een uitlog knop laten zien + de voor - en achternaam -->
                            <?php
                            if (isset($gebruikersnaam)) {
                                echo "<a href='php/logout.php' class='btn btn-secondary ml-1' role='button'>Uitloggen</a>
                                <a href='profiel.php' class='btn btn-primary ml-1' role='button'>$voornaam $achternaam</a>";
                            } else {
                                echo "<a class='btn btn-secondary ml-1' style='cursor: pointer' data-toggle='modal' data-target='#exampleModal'
                                role='button'>Inloggen</a>
                                <a class='btn btn-primary ml-1' style='cursor: pointer' data-toggle='modal' data-target='#exampleModal2'
                                role='button'>Registreren</a>";
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-1 align-self-center">
                        <button data-toggle="collapse" data-target="#navbarToggler" type="button"
                            class="navbar-toggler">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <form action="zoeken.php" method="get" class="mb-0">

        <div id="Lower-Header" style="background-color: #e8e8e8">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-md">
                    <div class="collapse navbar-collapse justify-content-center mt-3" id="navbarToggler">
                        <ul class="navbar-nav w-100">
                            <li class="w-75">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control" id="zoek" name="zoeken"
                                        placeholder="Zoek product">
                                </div>
                            </li>
                            <li>
                                <div class="form-group mr-2">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Categorieën&nbsp;<i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                            </li>
                            <li>
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-primary mr-2">Zoeken</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <?php include 'includes/categorieen.php'; ?>
            </div>
    </form>

    <?php include 'includes/login.php'; ?>

</header>