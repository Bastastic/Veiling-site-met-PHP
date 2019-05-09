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
                    <div class="col-5 align-self-center">
                        <div
                            class="row float-right justify-content-between justify-content-end flex-lg-row flex-md-row flex-column flex-column">
                            <a class="btn btn-secondary ml-1" data-toggle="modal" data-target="#exampleModal"
                                role="button">Inloggen</a>
                            <a class="btn btn-primary ml-1" data-toggle="modal" data-target="#exampleModal2"
                                role="button">Registreren</a>
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
    <form action="zoeken.php" method="get">

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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="inlogform" action="action_page.php">
                        <div class="logincontainer">
                            <div class="row justify-content-center">
                                <img src="images/512px-Circle-icons-profile.svg.png" alt="" width="35%"
                                    height="35%" /><br>
                            </div>
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="form-group">
                                    <br>
                                    <input type="text" name="Gebruikersnaam" id="Gebruikersnaam"
                                        class="form-control input-lg" placeholder="Gebruikersnaam" tabindex="3">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg"
                                    placeholder="Wachtwoord" tabindex="3">
                            </div>
                            <div class="col-xs-20 col-md-20"><input type="submit" value="Inloggen"
                                    class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                            <br>
                            <input type="checkbox" name="onthoudme" /> Wachtwoord Onthouden?<br>
                            <span class="password"><a href="#">Wachtwoord vergeten?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="inlogform" action="action_page.php">
                        <div class="logincontainer">
                            <div class="row justify-content-center">
                                <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt="" width="35%"
                                    height="35%" />
                            </div><br>
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Voornaam" id="Voornaam" class="form-control input-lg"
                                            placeholder="Voornaam" tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Achternaam" id="Achternaam"
                                            class="form-control input-lg" placeholder="Achternaam" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="Adresregel1" id="Adresregel1"
                                            class="form-control input-lg" placeholder="Adresregel 1" tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="Adresregel2" id="Adresregel2"
                                            class="form-control input-lg" placeholder="Adresregel 2" tabindex="2">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="Postcode" id="Postcode" class="form-control input-lg"
                                            placeholder="Postcode" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Plaatsnaam" id="Plaatsnaam"
                                            class="form-control input-lg" placeholder="Plaatsnaam" tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select id="Land" name="Land" class="form-control">
                                            <option selected>Kies een land...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="date" name="Geboortedatum" id="Geboortedatum" class="form-control input-lg"
                                    placeholder="Geboortedatum" tabindex="3">
                            </div>
                            <div class="form-group">
                                <input type="email" name="Emailadres" id="Emailadres" class="form-control input-lg"
                                    placeholder="Emailadres" tabindex="3">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select id="Vraag" name="Vraag" class="form-control">
                                            <option selected>Kies beveiligingsvraag...
                                            </option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Antwoord" id="Antwoord" class="form-control input-lg"
                                            placeholder="Antwoord" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Gebruikersnaam" id="Gebruikersnaam"
                                    class="form-control input-lg" placeholder="Gebruikersnaam" tabindex="3">
                            </div>
                            <div class="form-group">
                                <input type="text" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg"
                                    placeholder="Wachtwoord" tabindex="3">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Verkoper?
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-20 col-md-20"><input type="submit" value="Registreren"
                                    class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
</header>