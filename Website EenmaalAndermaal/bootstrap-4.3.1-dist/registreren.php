<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'includes/links.php'; ?>
  <link rel="stylesheet" href="css/login.css">
  <title>Document</title>
</head>

<?php include 'includes/header.php';

  if (isset($_GET['errc'])) {
      if ($_GET['errc'] == '1') {
          $msg = 'Deze gebruikersnaam is al bezet. Probeer het opnieuw!';
      }
  }
?>

<body>
  <div class="container">
    <form class="inlogform" action="actions/regsiter_action.php">
      <div class="logincontainer">
        <div class="imgcontainer">
          <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt="" />
        </div>
        <div class="row">
          <?php 

            if(isset($msg)){
              echo '<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                  <strong>Sorry!</strong> ' . $msg . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>';
            } 
        ?>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Voornaam" id="Voornaam" class="form-control input-lg" placeholder="Voornaam"
                tabindex="1">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Achternaam" id="Achternaam" class="form-control input-lg"
                placeholder="Achternaam" tabindex="2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <input type="text" name="Adresregel1" id="Adresregel1" class="form-control input-lg"
                placeholder="Adresregel 1" tabindex="1">
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <input type="text" name="Adresregel2" id="Adresregel2" class="form-control input-lg"
                placeholder="Adresregel 2" tabindex="2">
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <input type="text" name="Postcode" id="Postcode" class="form-control input-lg" placeholder="Postcode"
                tabindex="2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Plaatsnaam" id="Plaatsnaam" class="form-control input-lg"
                placeholder="Plaatsnaam" tabindex="1">
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
          <input type="email" name="Emailadres" id="Emailadres" class="form-control input-lg" placeholder="Emailadres"
            tabindex="3">
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <select id="Vraag" name="Vraag" class="form-control">
                <option selected>Kies een beveiligingsvraag...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Antwoord" id="Antwoord" class="form-control input-lg" placeholder="Antwoord"
                tabindex="2">
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control input-lg"
            placeholder="Gebruikersnaam" tabindex="3">
        </div>
        <div class="form-group">
          <input type="text" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg" placeholder="Wachtwoord"
            tabindex="3">
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
</body>
<?php include 'includes/footer.php'; ?>

</html>