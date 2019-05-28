<head>
</head>
<?php
    require_once 'php/countries.php';
    require_once 'php/connectDB.php';

    $sql = $dbh->prepare(
        "SELECT *
        FROM Vraag
        "
    );
    $sql->execute();
    $vragen = $sql->fetchAll();

?>
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
                <form class="inlogform" action="actions/login_action.php" method="POST">
                    <div class="logincontainer">
                        <div class="row justify-content-center">
                            <img src="images/512px-Circle-icons-profile.svg.png" alt="" width="35%" height="35%" /><br>
                        </div>
                        <div class="col-xs-20 col-sm-20 col-md-20">
                            <div class="form-group">
                                <br>
                                <input type="text" name="Gebruikersnaam" id="Gebruikersnaam"
                                    class="form-control input-lg" placeholder="Gebruikersnaam" tabindex="3">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg"
                                placeholder="Wachtwoord" tabindex="3">
                        </div>    
                        <div class="col-xs-20 col-md-20"><input type="submit" value="Inloggen"
                                class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <br>
                        <span class="password"><a href="../wachtwoordvergeten.php">Wachtwoord vergeten?</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Register -->

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
                <form class="inlogform" action="actions/register_action.php" method="POST">
                    <div class="logincontainer">
                        <div class="row justify-content-center">
                            <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt="" width="35%"
                                height="35%" />
                        </div><br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="Voornaam" id="Voornaam" class="form-control input-lg"
                                        placeholder="Voornaam*" tabindex="1" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="Achternaam" id="Achternaam" class="form-control input-lg"
                                        placeholder="Achternaam*" tabindex="2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <input type="text" name="Adresregel" id="Adresregel" class="form-control input-lg"
                                        placeholder="Adresregel*" tabindex="3" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <input type="text" name="Adresregel2" id="Adresregel2" class="form-control input-lg"
                                        placeholder="Adresregel 2" tabindex="4">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <input type="text" name="Postcode" id="Postcode" class="form-control input-lg"
                                        placeholder="Postcode*" tabindex="5" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="Plaatsnaam" id="Plaatsnaam" class="form-control input-lg"
                                        placeholder="Plaatsnaam*" tabindex="6" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select id="Land" name="Land" class="form-control" placeholder="Kies een land..." tabindex="7">
                                        <?php
                                            foreach ($countries as $key => $value) {
                                                echo "<option value='$value' title='$value'>$value</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="date" name="Geboortedatum" id="Geboortedatum" class="form-control input-lg"
                                placeholder="Geboortedatum*" tabindex="8" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="Emailadres" id="Emailadres" class="form-control input-lg"
                                placeholder="Emailadres*" tabindex="9" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select id="Vraag" name="Vraag" class="form-control" tabindex="10">
                                        <?php
                                        foreach ($vragen as $key => $value) {
                                            $vraagnr = $value['Vraagnummer'];
                                            $vraag = $value['Tekst_vraag'];

                                            echo "<option value='$vraagnr'>$vraag</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="Antwoord" id="Antwoord" class="form-control input-lg"
                                        placeholder="Antwoord*" tabindex="11" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control input-lg"
                                placeholder="Gebruikersnaam*" tabindex="12" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg"
                                placeholder="Wachtwoord*" tabindex="13" required>
                        </div>
                        <small>Velden gemarkeerd met een * zijn verplicht</small>
                        <div class="col-xs-20 col-md-20"><input type="submit" value="Registreren"
                                class="btn btn-primary btn-block btn-lg" tabindex="15">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>