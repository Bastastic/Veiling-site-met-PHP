<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Over ons</title>
</head>
<style>
    img {
        border-radius: 5px;
        border: 3px solid #ff814f;
    }

    .second-line,
    .fourth-line,
    .sixth-line {
        border-top: 3px solid #d61919;
    }

    .first-line,
    .thirth-line,
    .fifth-line {
        border-top: 3px solid #49c401;
    }

    .admin-line {
        border-top: 5px solid #ffad4f;
    }

    .col-xs-12,
    .col-sm-6,
    .col-md-4 {
        float: left;
    }

    .row-full {
        width: auto;
        position: relative;
    }
</style>

<?php
     include 'includes/header.php'; 
    ?>

<body style="overflow-x:hidden">

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Over ons</h1>
            <p class="lead">Wij zijn EenmaalAndermaal een bedrijf van iConcepts, die een groen alternatief willen bieden
                op de huidige monopoly markt in Nederland.</p>
            <p><a class="btn btn-lg btn-primary" href="contact.php" role="button">Neem contact met ons op</a></p>
        </div>
    </div>
    </div> <!-- /container -->
    <section id="team">
        <div class="container">
            <h5 class="section-title h1">Ons team</h5>
            <div class="row-full">
                <hr class="admin-line">
                <div class="row">
                    <!-- Team members -->
                    <!-- Erkan Alper -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class="img-fluid" src="images/erkan-alper.jpg" alt="card image">
                                            </p>
                                            <h4 class="card-title">Erkan Alper (613525)</h4>
                                            <p class="card-text">Profiel: Infrastructure & Security Managament (ISM)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dani Hengeveld -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/dani-hengeveld.jpg" alt="card image">
                                            </p>
                                            <h4 class="card-title">Dani Hengeveld (616743)</h4>
                                            <p class="card-text">Profiel: Software Development (SD)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Peiwand Ismaiel -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/peiwand-ismaiel.jpg" alt="card image">
                                            </p>
                                            <h4 class="card-title">Peiwand Ismaiel (619856)</h4>
                                            <p class="card-text">Profiel: Software Development (SD)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Seand Kurtovic -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card" style="padding-top: 0px;">
                                        <div class="card-body text-center" style="padding-top: 20px;">
                                            <p><img class=" img-fluid" src="images/senad-kurtovic.jpg"
                                                    alt="card image">
                                            </p>
                                            <h4 class="card-title">Seand Kurtovic (555081)</h4>
                                            <p class="card-text">Profiel: Software Development (SD)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bas Slijkhuis -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/bas-slijkhuis.jpg"
                                                    alt="card image">
                                            </p>
                                            <h4 class="card-title">Bas Slijkhuis (619105)</h4>
                                            <p class="card-text">Profiel: Bedrijfskunde Informatica & Managament (BIM)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Wesley Smeltink -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/wesley-smeltink.jpg" alt="card image">
                                            </p>
                                            <h4 class="card-title">Wesley Smeltink (604792)</h4>
                                            <p class="card-text">Profiel: Infrastructur & Security Management (ISM)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <h5 class="section-title h1">Begeleiders</h5>
                        <div class="row-full">
                            <hr class="admin-line">
                        </div>

                    </div>

                    <!-- Yakup Kucuk -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/yakup-kucuk.jpg" alt="card image">
                                            </p>
                                            <h4 class="card-title">Yakup Kucuk (kcky)</h4>
                                            <p class="card-text">Procesbegeleider (HAN)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Maria Boes-Voet -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/maria-boes-voet.jpg"
                                                    alt="card image">
                                            </p>
                                            <h4 class="card-title">Maria Boes-Voet (boesm)</h4>
                                            <p class="card-text">Professional Skills (HAN)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Jorg Visch -->
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 20px;">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="images/jorg-visch.jpg" alt="card image"></p>
                                            <h4 class="card-title">Jorg Visch (vschj)</h4>
                                            <p class="card-text">Productsbegeleider (HAN)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <br>
    <br>
</div>
</body>
<?php include('includes/footer.php'); ?>

</html>