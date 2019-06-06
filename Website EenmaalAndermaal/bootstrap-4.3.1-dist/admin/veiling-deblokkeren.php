<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; ?>
    <title>Geblokkeerde verkopers</title>
</head>

<?php include 'includes/sidebar.php';

    // met deze query halen we alle geblokkeerde gebruikers uit de database. 
    $query = $dbh->prepare("SELECT *
    FROM geblokkeerdeVeilingen
    ORDER BY Datum DESC, AdvertentieID DESC");
    $query->execute();
    $gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Geblokkeerde verkopers</h1>
        <form method='post' action='actions/deblokkeer.1.php' target='_self' class='row'>
            <div class='col-2 form-group'>
                <input type='number' name='AdvertentieID' placeholder='AdvertentieID*' class='form-control' required>
            </div>
            <div class='col-2 form-group'>
                <input type='submit' name='submit' value='Deblokkeer' class='btn btn-primary'>
            </div>
        </form>
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="spur-card-title">Geblokkeerde verkopers</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">AdvertentieID</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Reden</th>
                            <th scope="col">Deblokkeren</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( $gebruikers as $key => $value){
                            
                            $advertentieID = $value['AdvertentieID'];
                            $datum = $value['Datum'];
                            $reden = $value['Reden'];
                            echo  "<tr>
                            <div>
                                <td>$advertentieID</td>
                                <td>$datum</td>
                                <td>$reden</td>
                                <td><form method='post' action='actions/deblokkeer.1.php' target='_self' class='row'>
                                <div class='col form-group'>
                                    <input type='hidden' name='AdvertentieID' value='$advertentieID'>
                                    <input type='submit' name='submit' value='Deblokkeer' class='btn btn-primary'>
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