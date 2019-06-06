<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/links.php'; ?>
    <title>Veiling toevoegen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include ('includes/header.php');
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
</head>

<body>
<section id="team">
        <div class="container">
            <div class="row-full mx">
                <div class="row">
                    <!-- Team members -->
                    <!-- Erkan Alper -->
                    <div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <form enctype="multipart/form-data" action="uploadfoto.php" method="POST">
                                            <div class="form-group mx-5">
                                                <h4 class="card-title">Titel van Veiling:</h4>
                                                <input type="text" class="form-control" name="Titel" placeholder="Titel">
                                            </div>
                                            <h4 class="card-title">Foto bestand:</h4>
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                                                    <input name="fileToUpload1" id="fileToUpload" type="file" value=""/>
                                                    <input name="fileToUpload2" id="fileToUpload" type="file" value="" />
                                                </div>
                                                <br>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                                                    <input name="fileToUpload3" id="fileToUpload" type="file" value=""/>
                                                    <input name="fileToUpload4" id="fileToUpload" type="file" value="" />
                                                </div>
                                            </div>
                                            <div class="form-group mx-5">
                                                <h4 class="card-title">Beschrijving van veiling:</h4>
                                                <textarea class="form-control" name="Beschrijving" rows="3" placeholder="Beschrijving..."></textarea>
                                            </div>
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-4">
                                                    <h4 class="card-title">Startprijs:</h4>
                                                    <input type="text" class="form-control" name="Startprijs" min="1" placeholder="Prijs">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-4">
                                                    <h4 class="card-title">Looptijd (in dagen):</h4>
                                                    <select class="custom-select" name="Looptijd">
                                                        <option selected>Choose...</option>
                
                                                        <option value="1">1</option>
                                                        <option value="3">3</option>
                                                        <option value="5">5</option>
                                                        <option value="7">7</option>
                                                        <option value="10">10</option>
                                                    </select>                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-4">
                                                    <h4 class="card-title">Verzendkosten (in euros):</h4>
                                                    <input type="number" class="form-control"  name="Verzondkosten">
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-8">
                                                    <h4 class="card-title">Kies Betaalmethode:</h4>
                                                    <select class="custom-select" name="betalingwijze">
                                                        <option selected>Choose...</option>
                                                        <option value="1">Post</option>
                                                        <option value="2">Creditcard</option>
                                                        <option value="3">Bank</option>
                                                        <option value="4">iDeal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-8">
                                                <br>
                                                <br>
                                                <?php $cat = $_POST['cat'];?> 
                                                <input type="hidden" name="cat" value="<?=$cat;?>">
<<<<<<< HEAD
                                                <input type="submit" value="Advertentie plaatsen" name="AdvertentieP" class="btn btn-primary btn-block btn-lg"
=======
                                                <input type="submit" value="Voorbeeld inzien en plaatsen" name="AdvertentieP" class="btn btn-primary btn-block btn-lg"
>>>>>>> parent of 9b98f35... veiling toevoegen revert
                                                tabindex="7">
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<br>
</section>                
</body>
<footer>
<?php include('includes/footer.php'); ?>
</footer>
</html>