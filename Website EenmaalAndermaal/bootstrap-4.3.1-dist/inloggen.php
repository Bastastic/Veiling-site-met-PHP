<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <?php include 'includes/links.php'; ?>
    <link rel="stylesheet" href="css/login.css"/>
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
     include 'includes/header.php'; 
    ?>
    <form class="inlogform"action="action_page.php">
      <div class="logincontainer">
        <div class="imgcontainer">
        <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt=""/>
        </div>
        <div class="col-xs-20 col-sm-20 col-md-20">
        <div class="form-group">
				<input type="text" name= "Gebruikersnaam" id="Gebruikersnaam" class="form-control input-lg" placeholder="Gebruikersnaam" tabindex="3">
      </div>
</div>
      <div class="form-group">
				<input type="text" name= "Wachtwoord" id="Wachtwoord" class="form-control input-lg" placeholder="Wachtwoord" tabindex="3">
      </div>
      <div class="col-xs-20 col-md-20"><input type="submit" value="Inloggen" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
      <br>
          <input type="checkbox" checked="checked" name="onthoudme" /> onthouden 
          <span class="password">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </body>
</html>
