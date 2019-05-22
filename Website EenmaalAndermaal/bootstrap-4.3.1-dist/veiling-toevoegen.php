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
    <?php include ('includes/header.php')?>
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
                                            <form>
                                            <div class="form-group mx-5">
                                                <h4 class="card-title">Titel van Veiling:</h4>
                                                <input type="text" class="form-control" name="titelV" placeholder="Titel">
                                            </div>
                                            <div class="form-group mx-5">
                                                <h4 class="card-title">Beschrijving van veiling:</h4>
                                                <textarea class="form-control" name="Beschrijving" rows="3" placeholder="Beschrijving..."></textarea>
                                            </div>
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-3">
                                                    <h4 class="card-title">Startprijs:</h4>
                                                    <input type="text" class="form-control" name="Startprijs" placeholder="Prijs">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-3">
                                                    <h4 class="card-title">Looptijd (in dagen):</h4>
                                                    <input type="number" class="form-control"  name="Looptijd" min="1" max="14"">
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center mx-5">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                                                    <h4 class="card-title">Categorie:</h4>
                                                    <select class="custom-select" name="Categorie">
                                                        <option selected>Choose...</option>
                                                        <option value="1">Een</option>
                                                        <option value="2">twee</option>
                                                        <option value="3">Drie</option>
                                                    </select>
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