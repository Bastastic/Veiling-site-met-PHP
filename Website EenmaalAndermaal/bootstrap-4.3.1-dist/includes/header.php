<?php require_once ('php/connectDB.php'); ?>
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
                    <div class="col-6 align-self-center">
                        <div class="row float-right justify-content-end flex-lg-row flex-md-row flex-column flex-column">
                                <a href="inloggen.php" class="btn btn-secondary" role="button">Inloggen</a>
                                <a href="registreren.php" class="btn btn-primary" role="button">Registreren</a>
                        </div>
                    </div>
                    <div class="col-1 align-self-center">
                    <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div id="Lower-Header" style="background-color: #e8e8e8">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md">
                <div class="collapse navbar-collapse justify-content-center mt-3" id="navbarToggler">
                    <ul class="navbar-nav">
                        <li>
                            <form action="zoeken.php" method="get">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control" id="zoek" name="zoeken" placeholder="Zoek product">
                                </div>
                            </li>
                            <li>
                                <div class="form-group mr-2">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Categorieën
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
                        </form>    
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <?php include 'includes/categorieen.php'; ?>
    </div>
</div>
</header>