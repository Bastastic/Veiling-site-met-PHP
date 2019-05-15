<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <link rel="stylesheet" href="css/faq.css" />

    <title>Profiel</title>
</head>

<?php include 'includes/header.php'; ?>
<body>
    <br>
    
    <div class="container">
        <?php
        // haal hier de gebruiker uit de sessievariabele
            echo "<h1>Welkom $voornaam $achternaam</h1>"
        ?>

        <br>
        <div class="row" id="parentTab">
            <div class="col-md-3" id="sidebar">
                <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                    <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1"
                        aria-selected="true">
                        <i class="mdi mdi-help-circle"></i> Dashboard
                    </a>
                    <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        <i class="mdi mdi-account"></i> Wachtwoord
                    </a>
                    <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3"
                        aria-selected="false">
                        <i class="mdi mdi-account-settings"></i> Lopende veilingen
                    </a>
                    <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4"
                        aria-selected="false">
                        <i class="mdi mdi-heart"></i> Uw veilingen
                    </a>
                </div>
            </div>
            <div class="col-md-9 accordion-group">
                <div class="tab-content" id="faq-tab-content">
                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="accordion" id="accordion-tab-1">
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
                                            <p class="mb-1" >Verkoper worden?</p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verkoperWorden" role="button">
                                                Update account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                        <div class="accordion" id="accordion-tab-2">
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
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                        <div class="accordion" id="accordion-tab-3">
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
                                            <!-- hier content schrijven -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                        <div class="accordion" id="accordion-tab-4">
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
                                            <!-- hier content schrijven -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>

<!-- popup window voor verkoper worden -->
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
                <p>Minimaal 1 betaalwijze invullen</p><br>

                <script type="text/javascript">
                    function validateForm() {
                        var a=document.forms["verkoper"]["IBAN"].value;
                        var b=document.forms["verkoper"]["ccNummer"].value;
                        if ((a==null || a=="") && (b==null || b=="")) {
                            alert("Vul minimaal 1 betaalwijze in.");
                            return false;
                        } else {
                            return true;
                        }
                    }
                </script>

                <form action="" method="post" name="verkoper" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="bank">Bank</label>
                                <div class="form-group">
                                    <select class="form-control" id="bank" name="bank">
                                        <option>Kiew uw bank</option>
                                        <option>ING</option>
                                        <option>Rabobank</option>
                                        <option>ABN-Amro</option>
                                        <option>ASN</option>
                                        <option>SNS</option>
                                        <option>DHB</option>
                                        <option>Bunq</option>
                                        <option>Knab</option>
                                        <option>Triodos bank</option>
                                    </select>
                                </div>
                                <label for="IBAN">IBAN</label>
                                <input type="text" class="form-control" id="IBAN" name="IBAN" placeholder="Vul uw IBAN in">
                            </div>
                        </div>
                        <div class="col-6 border-left">
                            <label for="ccNummer">Creditcard nummer</label>
                            <input type="text" class="form-control" id="ccNummer" name="ccNummer" placeholder="Vul uw creditcard nummer in">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include 'php/phpcreditcard.php';


    if ((isset($_POST['IBAN']) && $_POST['IBAN'] != "") && (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "")) {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];
        $ccNummer = $_POST['ccNummer'];
        
        echo "beide";
    } else if (isset($_POST['IBAN']) && $_POST['IBAN'] != "") {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];

        echo "bank";
    } else if (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "") {
        $ccNummer = $_POST['ccNummer'];

        if (check_cc($ccNummer)) {
            echo "goed";
        } else {
            echo "fout";
        }

    } else {
    }
?>

<br>
</body>
<?php include 'includes/footer.php'; ?>
</html>