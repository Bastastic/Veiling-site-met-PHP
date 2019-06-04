<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'includes/links.php'; ?>
  <link rel="stylesheet" href="css/login.css">
  <title>Registreren</title>
</head>

<?php include 'includes/header.php';

  require_once 'php/countries.php';

  $sql = $dbh->prepare(
      "SELECT *
      FROM Vraag
      "
  );
  $sql->execute();
  $vragen = $sql->fetchAll();

  if (isset($_GET['errc'])) {
    if ($_GET['errc'] == '1') {
      $msg = 'Deze gebruikersnaam is al bezet. Probeer het opnieuw!';
    } else if ($_GET['errc'] == '2') {
      $msg = 'Dit e-mailadres is al bezet. Probeer het opnieuw!';
    } else if ($_GET['errc'] == '3') {
      $msg = 'Er is iets fout gegaan. Probeer het opnieuw!';
    }
  }
?>

<body>
  <div class="container">
    <form class="inlogform" action="actions/register_action.php" method="post">
      <div class="logincontainer">
        <div class="imgcontainer">
          <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt="" />
        </div>
        <div class="row">
          <?php

            if (isset($msg)) {
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
              <input type="text" name="Voornaam" id="Voornaam" class="form-control input-lg" placeholder="Voornaam*"
                tabindex="1">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Achternaam" id="Achternaam" class="form-control input-lg"
                placeholder="Achternaam*" tabindex="2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <input type="text" name="Adresregel" id="Adresregel" class="form-control input-lg"
                placeholder="Adresregel 1*" tabindex="3">
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
              <input type="text" name="Postcode" id="Postcode" class="form-control input-lg" placeholder="Postcode*"
                tabindex="5">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Plaatsnaam" id="Plaatsnaam" class="form-control input-lg"
                placeholder="Plaatsnaam*" tabindex="6">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <select id="Land" name="Land" class="form-control" tabindex="7">
              <?php
                  foreach ($countries as $key => $value) {
                      echo "<option value='". strip_tags($value) ."' title='". strip_tags($value) ."'>". strip_tags($value) ."</option>";
                  }
              ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="date" name="Geboortedatum" id="Geboortedatum" class="form-control input-lg"
            placeholder="Geboortedatum*" tabindex="8">
        </div>
        <div class="form-group">
          <input type="email" name="Emailadres" id="Emailadres" class="form-control input-lg" placeholder="Emailadres*"
            tabindex="9">
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <select id="Vraag" name="Vraag" class="form-control" tabindex="10">
              <?php
                foreach ($vragen as $key => $value) {
                    $vraagnr = strip_tags($value['Vraagnummer']);
                    $vraag = strip_tags($value['Tekst_vraag']);

                    echo "<option value='". strip_tags($vraagnr). "'>" . strip_tags($vraag) . "</option>";
                }
              ?>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="Antwoord" id="Antwoord" class="form-control input-lg" placeholder="Antwoord*"
                tabindex="11">
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control input-lg"
            placeholder="Gebruikersnaam*" tabindex="12">
        </div>
        <div class="form-group">
          <input type="password" name="wachtwoord" id="wachtwoord" class="form-control input-lg" placeholder="Wachtwoord*"
            tabindex="13" onkeyup="checkPass();">
        </div>
        <div class="form-group">
          <input type="password" name="wachtwoord2" id="wachtwoord2" class="form-control input-lg" 
            placeholder="Wachtwoord herhalen*" tabindex="14" value="Wachtwoord" onkeyup="checkPass();">
            <span id="confirm-message2" class="confirm-message"></span>
            <script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('wachtwoord');
    var confirm  = document.getElementById('wachtwoord2');
    //Store the Confirmation Message Object ...
    var message = document.getElementById('confirm-message2');
    //Set the colors we will be using ...
    var good_color = "#66cc66";
    var bad_color  = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirm.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirm.style.backgroundColor = good_color;
        message.style.color           = good_color;
        message.innerHTML             = "Wachtwoorden komen overeen";
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirm.style.backgroundColor = bad_color;
        message.style.color           = bad_color;
        message.innerHTML             = "Wachtwoorden komen niet overeen";
    }
}  
</script>
        </div>
        <div class="form-group">
          <div class="form-check">
          </div>
          <small>Velden gemarkeerd met een * zijn verplicht</small>
        </div>
        <div class="col-xs-20 col-md-20"><input type="submit" value="Registreren"
            class="btn btn-primary btn-block btn-lg" tabindex="14"></div>
      </div>
    </form>
  </div>
</body>
<?php include 'includes/footer.php'; ?>

</html>