<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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