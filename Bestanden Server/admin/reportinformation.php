<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Rapporteerinfo</title>
</head>

<?php 

    include 'includes/sidebar.php'; 
    $gebruiker = $_GET['Verkoper'];

    $query = $dbh->prepare("SELECT AdvertentieID, Rapporteerde, Omschrijving
    FROM Rapporteren
    INNER JOIN Voorwerp ON AdvertentieID = Voorwerpnummer 
    WHERE Voorwerp.Verkoper = '$gebruiker'");
    $query->execute();
    $gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Gerapporteerde veilingen van <?=$gebruiker?></h1>
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="spur-card-title">Gerapporteerde veilingen</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">Advertentie ID</th>
                            <th scope="col">Gerapporteerd door</th>
                            <th scope="col">Omschrijving</th>
                            <th scope="col">Bezichtig advertentie</th>
                            <th scope="col">Blokkeer advertentie</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ( $gebruikers as $key => $value){
                            
                            $advertentieID = $value['AdvertentieID'];
                            $Rapporteerde = $value['Rapporteerde'];
                            $Omschrijving = $value['Omschrijving'];
                            echo  "<tr>
                                <td>$advertentieID</td>
                                <td>$Rapporteerde</td>
                                <td>$Omschrijving</td>
                                <td><a href='../biedingspagina.php?voorwerpnummer=$advertentieID' class='btn btn-primary'>Bekijk</a></td>
                                <td><a class='btn btn-primary'>Blokkeer</a></td>
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