<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include 'includes/links.php'; ?>
  <link rel="stylesheet" href="css/login.css" />
  <title>Inloggen</title>
</head>

<?php
     include 'includes/header.php';
//als de wachtwoord niet correct is dan zal er een error komen
     if (isset($_GET['errc'])) {
         if ($_GET['errc'] == '1') {
             $msg = 'De combinatie van deze gebruikersnaam met dit wachtwoord is bij ons niet bekend. Probeer het opnieuw!';
         }
     }
    ?>

<body>
  <div class="container">
    <form class="inlogform" action="actions/login_action.php" method="post">
      <div class="logincontainer">
        <div class="imgcontainer">
          <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt="" />
        </div>
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
        <div class="col-xs-20 col-sm-20 col-md-20">
          <div class="form-group">
            <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control input-lg"
              placeholder="Gebruikersnaam" tabindex="3">
          </div>
        </div>
        <div class="form-group">
          <input type="password" name="Wachtwoord" id="Wachtwoord" class="form-control input-lg"
            placeholder="Wachtwoord" tabindex="3">
        </div>
        <div class="col-xs-20 col-md-20"><input type="submit" value="Inloggen" class="btn btn-primary btn-block btn-lg"
            tabindex="7">
        </div>
        <br>
        <span class="password"><a href="wachtwoordvergeten.php">Wachtwoord vergeten?</a></span>
      </div>
    </form>
  </div>
</body>

<?php
     include 'includes/footer.php';
    ?>

</html>