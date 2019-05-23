<?php 
include 'includes/header.php';
include 'includes/links.php';
$uploadDir = 'pics';

if(isset($_POST['submit']))
{
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];

$filePath = $uploadDir . $fileName;

$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
echo "Error uploading <strong>file</strong>";
exit;
}

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
    $filePath = addslashes($filePath);
}

$title = $_POST['title'];
$description = $_POST['description'];
$query = "INSERT INTO $voorwerpen (file, title, description) VALUES ('$filePath', '$title', '$description')";


mssql_query($query); 

}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<form name="Image" enctype="multipart/form-data" action="upload-pics2.php" method="POST">
 Title <input type="text" name="title" maxlength="100" class="textbox" value="<?php echo $form->value("title"); ?>" />
 Description <textarea name="description" rows="8" cols="40" class="textbox" value="<?php echo $form->value("description"); ?>"></textarea>
 File <input type="file" name="file" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png" size="26" class="textbox" />
 <input type="submit" name="submit" value="Upload" class="button" />
</form>

</body>
<footer>
    <?php include 'includes/footer.html'; ?>
</footer>
</html>