<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; ?>
    <title>Verkopers in afwachting</title>
</head>

<?php include 'includes/sidebar.php';

    // met deze query halen we alle geblokkeerde gebruikers uit de database. 
    $query = $dbh->prepare("SELECT Gebruiker.Voornaam, Gebruiker.Achternaam, Verkoper.Gebruiker, Verkoper.Bank, Verkoper.Bankrekening, Verkoper.Creditcard
    FROM Verkoper
    INNER JOIN Gebruiker ON Gebruiker.Gebruikersnaam = Verkoper.Gebruiker 
    WHERE  Controle_optie = 'In afwachting' ");
    $query->execute();
    $gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);  
    if (isset($_GET['errc'])) {
        $type = 'danger';
        $titel = 'Sorry!';
        if ($_GET['errc'] == '1') {
            $msg = 'mail is niet verstuurd, probeer het opnieuw';
        }
    }
?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Verkopers in afwachting</h1>
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="spur-card-title">Verkopers in afwachting</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">Voornaam</th>
                            <th scope="col">Achternaam</th>
                            <th scope="col">Gebruiker</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Bankrekening</th>
                            <th scope="col">Creditcard</th>
                            <th scope="col"><i class="fas fa-check"></i> Goedkeuren</th>
                            <th scope="col"><i class="fas fa-times"></i> Afkeuren</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( $gebruikers as $key => $value){
        
                            $voornaam = $value['Voornaam'];
                            $achternaam = $value['Achternaam'];
                            $gebruiker = $value['Gebruiker'];
                            $bank = $value['Bank'];
                            $bankrekening = $value['Bankrekening'];
                            $creditcard = $value['Creditcard'];
                            echo  "<tr>
                                <td>$voornaam</td>
                                <td>$achternaam</td>
                                <td>$gebruiker</td>
                                <td>$bank</td>
                                <td>$bankrekening</td>
                                <td>$creditcard</td>
                                <td><form action='actions/goedkeuren_action.php' method='post' class='form-group'><input type='hidden' name='Gebruiker' value='$gebruiker'><input type='submit' class='btn btn-success' value='Goedkeuren'></form></td>    
                                <td><form action='actions/afkeuren_action.php' method='post' class='form-group'><input type='hidden' name='Gebruiker' value='$gebruiker'><input type='submit' class='btn btn-danger' value='Afkeuren'></form></td>    
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