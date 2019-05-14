<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Profiel</title>
</head>

<?php include 'includes/header.php'; ?>
<body>
    <br>
    
    
    
    <div class="container">
        <?php
        // haal hier de gebruiker uit de sessievariabele
            $gebruiker = "tempUser";

            echo "<h1>Welkom $gebruiker</h1>"
        ?>

        <br>
        <div class="row">
            <div class="col-md-3" id="sidebar">
                <div class="list-group ">
                <a href="#dashboard" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    Dashboard
                </a>
                <a href="#wachtwoord" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="wachtwoord">
                    Wachtwoord
                </a>
                <a href="#lopendeVeilingen" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="lopendeVeilingen">
                    Lopende Veilingen
                </a>
                <a href="#veilingen" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="veilingen">
                    Uw veilingen
                </a>

                </div> 
            </div>
            <div class="col-md-9">
                <!-- dashboard tab -->
                <div class="collapse" id="dashboard">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Dashboard</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- content -->
                                    <p>Verkoper worden?</p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verkoperWorden" role="button">
                                        Update account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- wachtwoord tab -->
                <div class="collapse" id="wachtwoord">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Wachtwoord veranderen</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- content -->
                                    <form>
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">Wachtwoord</label> 
                                        <div class="col-8">
                                        <input id="oudWW" name="oudWW" placeholder="Wachtwoord" class="form-control here" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">Nieuw wachtwoord</label> 
                                        <div class="col-8">
                                        <input id="nieuwWW" name="nieuwWW" placeholder="Wachtwoord" class="form-control here" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Nieuw wachtwoord herhalen</label> 
                                        <div class="col-8">
                                        <input id="nieuwWWher" name="nieuwWWher" placeholder="Wachtwoord" class="form-control here" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update Wachtwoord</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lopende veilingen tab -->
                <div class="collapse" id="lopendeVeilingen">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Lopende veilingen</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- uw veilingen tab -->
                <div class="collapse" id="veilingen">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Uw veilingen</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="verkoperWorden" tabindex="-1" role="dialog" aria-labelledby="verkoperWordenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Vul uw betaalgegevens in</h2>

                <div class="row">
                    <div class="col-6">
                        test
                    </div>

                    <div class="col-6">
                        test
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <br>
</body>
<?php include 'includes/footer.php'; ?>
</html>