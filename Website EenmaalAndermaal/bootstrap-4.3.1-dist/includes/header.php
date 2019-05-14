<?php 
require_once ('php/connectDB.php');
session_start();
if(isset($_SESSION['userID'])){
    $gebruikersnaam = $_SESSION['userID'];
    $sql = $dbh->prepare("SELECT Voornaam, Achternaam
                    FROM Gebruiker
                    WHERE Gebruikersnaam = :gebruikersnaam");
    $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
    $gebruiker = $sql->fetch(PDO::FETCH_ASSOC);
    $voornaam = $gebruiker['Voornaam'];
    $achternaam = $gebruiker['Achternaam'];
}

	print_r($_POST);
	if(isset($_POST) & !empty($_POST)){
		if($_POST['captcha'] == $_SESSION['code']){
			echo "correct captcha";
		}else{
			echo "Invalid captcha";
		}
	}
?>
<header>
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
                        <div class="row float-right justify-content-between justify-content-end flex-lg-row flex-md-row flex-column flex-column">

                            <?php 
                            if(isset($gebruikersnaam)){
                                echo "<a href='../php/logout.php' class='btn btn-secondary ml-1' role='button'>Uitloggen</a>
                                <a href='../profiel.php' class='btn btn-primary ml-1' role='button'>$voornaam $achternaam</a>";
                            }else{
                                echo "<a class='btn btn-secondary ml-1' data-toggle='modal' data-target='#exampleModal'
                                role='button'>Inloggen</a>
                                <a class='btn btn-primary ml-1' data-toggle='modal' data-target='#exampleModal2'
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
                        <ul class="navbar-nav">
                            <li>
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
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control " id="postcode" placeholder="Postcode">
                                </div>
                            </li>
                            <li>
                                <div class="form-group mr-2">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Afstand</option>
                                        <option>10 KM</option>
                                        <option>25 KM</option>
                                        <option>50 KM</option>
                                        <option>75 KM </option>
                                    </select>
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