<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/login.css"/>
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
     include 'header.php'; 
    ?>
    <form class="inlogform"action="action_page.php">
      <div class="logincontainer">
        <div class="imgcontainer">
        <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt=""/>
        </div>
        <label for="Gebruikersnaam"><b>Gebruikersnaam</b></label>
        <input class="inlogbalk" type="text" placeholder="Gebruikernaam" name="Gebruikersnaam" required />
        <label for="Wachtwoord"><b>Wachtwoord</b></label>
        <input
          class="inlogbalk"
          type="password"
          placeholder="Wachtwoord"
          name="Wachtwoord"
          required
        />
        <button class="inlogbutton" type="submit">Login</button>
        <br>
        <br>
          <input type="checkbox" checked="checked" name="onthoudme" /> onthouden 
          <span class="password">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </body>
</html>
