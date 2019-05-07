<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
        include 'includes/links.php';
        require 'php/connectDB.php';
    ?>
    <title>Categorieën</title>
</head>

<?php include 'includes/header.php'; ?>
<body>
    <div class="container">
        <?php
        $sql = $dbh->query("select * from Rubriek");
        $resultaat = $sql->fetchAll(PDO::FETCH_NUM);

            if ($resultaat) {
                $kolommen = 0;
                for ($i = 0; $i < count($resultaat); $i++){
                    $rubrieknummer = $resultaat[$i][0];
                    $rubrieknaam = $resultaat[$i][1];
                    $hoofdrubriek = $resultaat[$i][2];
                    $volgnr = $resultaat[$i][3];

                    if ($kolommen % 3 == 0) {
                        echo "<div class='row'>";
                    }

                    if ($hoofdrubriek == null) {
                        echo "<div class='col-4'>";
                        $kolommen++;
                    }
                    
                    echo "<p>$rubrieknaam</p><br>";

                    if ($hoofdrubriek == null) {
                        echo "</div>";
                    }

                    if ($kolommen % 3 == 0) {
                        echo "</div>";
                    }
                }
            }
            else {
                echo "<p>We hebben niets gevonden wat lijkt op je zoekcriteria :(</p>";
            }
        ?>
    </div>
</body>
<?php include 'includes/footer.php'; ?>
</html>