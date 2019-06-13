<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Contact</title>
</head>

<?php include 'includes/header.php'; ?>

<body>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-lg-offset-2">
        <form id="contact-form" method="post" action="" role="form">
          <div class="messages"></div>
          <div class="controls">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Voornaam *</label>
                  <input id="form_name" type="text" name="name" class="form-control"
                    placeholder="Vul alsjeblieft je voornaam in *" required="required"
                    data-error="Voornaam is verplicht">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Achternaam *</label>
                  <input id="form_lastname" type="text" name="surname" class="form-control"
                    placeholder="Vul alsjeblieft je achternaam in *" required="required"
                    data-error="Achternaam is verplicht">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control"
                    placeholder="Vul alsjebleft je email in *" required="required" data-error="Juist email adres nodig">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_phone">Telefoonnummer</label>
                  <input id="form_phone" type="tel" name="phone" class="form-control"
                    placeholder="Vul alsjeblieft je telefoonnummer in">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Bericht *</label>
                  <textarea id="form_message" name="message" class="form-control"
                    placeholder="Vul je bericht in alsjeblieft *" rows="4" required
                    data-error="Alsjeblieft stuur ons een bericht."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary btn-send" value="Stuur bericht">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php include 'includes/footer.php'; ?>

</html>