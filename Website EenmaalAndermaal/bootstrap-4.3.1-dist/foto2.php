<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Document</title>
</head>

<?php include 'includes/header.php'; ?>
<body>



<form enctype="multipart/form-data" action="uploadfoto.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="fileToUpload" id="fileToUpload" type="file" />
    <input type="submit" name='submit' value="Send File" />
</form>



