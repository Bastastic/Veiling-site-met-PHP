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
<br>
    <div class="container">
        <?php
        $sql = $dbh->query("select * from Rubriek");
        $resultaat = $sql->fetchAll(PDO::FETCH_NUM);

            if ($resultaat) {
                $first = true;
                $kolommen = 0;

                for ($i = 0; $i < count($resultaat); $i++){
                    $rubrieknummer = $resultaat[$i][0];
                    $rubrieknaam = $resultaat[$i][1];
                    $hoofdrubriek = $resultaat[$i][2];
                    $volgnr = $resultaat[$i][3];

                    if ($hoofdrubriek == null) {
                        // if ($kolommen % 3 == 0) {
                        //     echo "<div class='col-4'>";
                        // }

                        if ($first == true) {
                            $first = false;
                            $idnaam = $rubrieknummer;
                            echo "
                            <div id='accordion'>
                                <div class='card'>
                                    <div class='card-header' id='h$rubrieknummer'>
                                        <h5 class='mb-0'>
                                            <button class='btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            $rubrieknaam
                                            </button>
                                        </h5>
                                    </div>
                                    <div id='c$rubrieknummer' class='collapse show' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                    <div class='card-body'>
                                    <ul class='list-unstyled'>
                            ";
                        } else {
                            $idnaam = $rubrieknummer;
                            echo "
                            </div>
                            </div>
                            </ul>
                            </div>
                            <div id='accordion'>
                                <div class='card'>
                                    <div class='card-header' id='h$rubrieknummer'>
                                        <h5 class='mb-0'>
                                            <button class='btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            $rubrieknaam
                                            </button>
                                        </h5>
                                    </div>
                                    <div id='c$rubrieknummer' class='collapse show' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                    <div class='card-body'>
                                    <ul class='list-unstyled'>
                            ";
                        }
                    } else {
                        echo "
                            <li><a href=''>$rubrieknaam</a></li>
                        ";
                    }
                }
            }
            else {
                echo "<p>We hebben niets gevonden wat lijkt op je zoekcriteria :(</p>";
            }
        ?>

    </div>
    </div>
    </ul>
    </div>
    <br>
</body>
<?php include 'includes/footer.php'; ?>
</html>