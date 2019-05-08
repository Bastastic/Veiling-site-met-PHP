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
    <div id="accordion">
        <?php
        $sql = $dbh->prepare("select * from Rubriek");
        $sql->execute();
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
                        if ($first == true) {
                            $first = false;
                            $idnaam = $rubrieknummer;
                            echo "<div class='row'>";
                            echo "
                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                    <div class='card rounded-0'>
                                        <button id='h$rubrieknummer' class='card-header btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            <a href='zoeken.php?cat=$rubrieknaam'>$rubrieknaam</a>
                                        </button>
                                        <div id='c$rubrieknummer' class='collapse hide' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                        <div class='card-body'>
                                        <ul class='list-unstyled'>
                            ";
                        } else {
                            if ($kolommen % 3 == 0) {
                                echo "</div><div class='row'>";
                            }
                            $idnaam = $rubrieknummer;
                            echo "
                            </div>
                            </ul>

                            </div>
                            </div>
                            </div>
                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                    <div class='card rounded-0'>
                                        <button id='h$rubrieknummer' class='card-header btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            <a href='zoeken.php?cat=$rubrieknaam'>$rubrieknaam</a>                                        </button>
                                        <div id='c$rubrieknummer' class='collapse hide' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                        <div class='card-body'>
                                        <ul class='list-unstyled'>
                            ";
                        }
                    } else {
                        echo "
                            <li><a href='zoeken.php?cat=$rubrieknaam'>$rubrieknaam</a></li>
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
    </div>
    </div>
    </ul>

    </div>
    </div>
    </div>
    </div>

    <br>
</body>
<?php include 'includes/footer.php'; ?>
</html>