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
    include 'index.php'
    ?>
    <form action="action_page.php">
      <br>
      <br>
      <br>
      <div class="container">
        <div class="imgcontainer">
        <img src="images/512px-Circle-icons-profile.svg.png" class="avatar" alt=""/>
        </div>
        <label for="Gebruikersnaam"><b>Gebruikersnaam</b></label>
        <input type="text" placeholder="Gebruikernaam" name="Gebruikersnaam" required />
        <label for="Wachtwoord"><b>Wachtwoord</b></label>
        <input
          type="password"
          placeholder="Wachtwoord"
          name="Wachtwoord"
          required
        />
        <button type="submit">Login</button>
        <br>
        <br>
          <input type="checkbox" checked="checked" name="onthoudme" /> onthouden 
          <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
