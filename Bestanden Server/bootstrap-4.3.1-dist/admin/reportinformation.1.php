<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Rapporteerinfo</title>
</head>

<?php 

    include 'includes/sidebar.php'; 
    $AdvertentieID = $_GET['AdvertentieID'];

    $query = $dbh->prepare("SELECT AdvertentieID, Rapporteerde, Omschrijving
FROM Rapporteren
INNER JOIN Voorwerp ON AdvertentieID = Voorwerpnummer 
WHERE Voorwerp.Voorwerpnummer = '$AdvertentieID'");
$query->execute();
$gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Rapporten van <?=$AdvertentieID?> &nbsp <a class='btn btn-primary'>Blokkeer</a></h1>
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="spur-card-title">Gerapporteerd op deze advertentie: </div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">Gerapporteerd door</th>
                            <th scope="col">Omschrijving</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($gebruikers as $key => $value){
                            
                            $Rapporteerde = $value['Rapporteerde'];
                            $Omschrijving = $value['Omschrijving'];
                            echo  "<tr>
                                <td>$Rapporteerde</td>
                                <td>$Omschrijving</td>
                                </tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</div>
</div>