<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; ?>
    <title>Gerapporteerde verkopers</title>
</head>

<?php include 'includes/sidebar.php';

    // met deze query halen we alle geblokkeerde gebruikers uit de database. 
    $query = $dbh->prepare("SELECT Voorwerp.Verkoper, Count(Voorwerp.Verkoper) as Aantal_keer_Gerappoteerd
    from Voorwerp
    INNER JOIN Rapporteren ON Voorwerp.Voorwerpnummer = Rapporteren.AdvertentieID
    WHERE Voorwerp.Verkoper NOT IN (SELECT Gebruiker FROM geblokkeerd)
    GROUP BY Voorwerp.Verkoper 
    ORDER BY Aantal_keer_Gerappoteerd DESC");
    $query->execute();
    $gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Gerapporteerde verkopers</h1>
        <form method='post' action='actions/blokkeer.php' target='_self' class="row">
            <div class="col-2 form-group">
                <input type='text' name='gebruikersnaam' class="form-control" placeholder='Gebruikersnaam*' required>
            </div>
            <div class='col-2 form-group'>
                <input type='number' name='duur' class='form-control' placeholder='Dagen'>
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
                <div class="spur-card-title">Gerapporteerde verkopers</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">Gebruiker</th>
                            <th scope="col">Aantal</th>
                            <th scope="col">Meer info</th>
                            <th scope="col">Bezichtig advertentie</th>
                            <th scope="col">Blokkeer gebruiker</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( $gebruikers as $key => $value){
                            
                            $gebruiker = $value['Verkoper'];
                            $aantalkeer = $value['Aantal_keer_Gerappoteerd'];
                            echo  "<tr>
                            <div>
                                <td>$gebruiker</td>
                                <td>$aantalkeer</td>
                                <td><a href='reportinformation.php?Verkoper=$gebruiker' class='btn btn-primary'>Meer info</a></td>
                                <td><a href='../biedingspagina.php?voorwerpnummer=$advertentieID' class='btn btn-primary'>Bekijk</a></td>
                                <td><form method='post' action='actions/blokkeer.php' target='_self' class='row'>
                                <div class='col form-group'>
                                    <input type='number' name='duur' class='form-control' placeholder='Duur in dagen*' required>
                                </div>
                                <div class='col form-group'>
                                    <input type='text' name='reden' class='form-control' placeholder='Reden*' required>
                                    <input type='hidden' name='gebruikersnaam' value='$gebruiker'>
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