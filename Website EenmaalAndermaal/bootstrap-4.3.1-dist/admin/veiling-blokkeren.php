<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; ?>
    <title>Verkoper blokkeren</title>
</head>

<?php include 'includes/sidebar.php';

    $query = $dbh->prepare("SELECT AdvertentieID, Count(AdvertentieID) as Aantal_keer_Gerappoteerd
    from Rapporteren
    GROUP BY AdvertentieID
    ORDER BY Aantal_keer_Gerappoteerd DESC");
    $query->execute();
    $advertentie = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Advertenties blokkeren</h1>
        <form method='post' action='actions/blokkeer.1.php' target='_self' class="row">
            <div class="col-2 form-group">
                <input type='number' name='AdvertentieID' class="form-control" placeholder='AdvertentieID *' required>
            </div>
            <div class='col-6 form-group'>
                <input type='text' name='reden' class='form-control' placeholder='Reden*' required>
            </div>
            <div class='col-2 form-group'>
                <input type='submit' name='submit' value='Blokkeer' class='btn btn-primary'>
            </div>
        </form>
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="spur-card-title">Gerapporteerde advertenties</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">AdvertentieID</th>
                            <th scope="col">Aantal</th>
                            <th scope="col">Meer info</th>
                            <th scope="col">Bezichtig advertentie</th>
                            <th scope="col">Blokkeer advertentie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( $advertentie as $key => $value){
                            
                            $adID = $value['AdvertentieID'];
                            $aantalkeer = $value['Aantal_keer_Gerappoteerd'];
                            echo  "<tr>
                            <div>
                                <td>$adID</td>
                                <td>$aantalkeer</td>
                                <td><a href='reportinformation.1.php?AdvertentieID=$adID' class='btn btn-primary'>Meer info</a></td>
                                <td><a href='../biedingspagina.php?voorwerpnummer=$adID' class='btn btn-primary'>Bekijk</a></td>
                                <td><form method='post' action='actions/blokkeer.1.php' target='_self' class='row'>
                                <div class='col form-group'>
                                    <input type='text' name='reden' class='form-control' placeholder='Reden*' required>
                                    <input type='hidden' name='AdvertentieID' value='$adID'>
                                </div>
                                <div class='col form-group'>
                                    <input type='submit' name='submit' value='Blokkeer' class='btn btn-primary'>
                                </div>
                            </form></td>
                                </div>    
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