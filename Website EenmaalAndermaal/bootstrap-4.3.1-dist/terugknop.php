<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'includes/links.php'; ?>
  <link rel="stylesheet" href="css/login.css" />
  <title>Terugknop</title>
</head>
<?php include 'includes/header.php'; ?>

<body>
  <button type="button" class="btn btn-primary" onclick="goBack()"><i class="fa fa-reply"></i></button>
</body>

<?php include 'includes/footer.html'; ?>

</html>

<script>
  function goBack() {
    window.history.back();
  }
</script>