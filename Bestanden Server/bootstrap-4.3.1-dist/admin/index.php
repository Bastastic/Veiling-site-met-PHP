<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; 
      if (isset($_GET['succ'])) {
        $type = 'success';
        $titel = 'Top!';
        if ($_GET['succ'] == '1') {
            $msg = 'Niet geactiveerde accounts succesvol verwijderd!';
        }
    }
    ?>
    <title>Dashboard</title>
</head>

<?php include 'includes/sidebar.php' ?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Grafieken</h1>
        <div class="row">
        <?php
            if (isset($msg)) {
                echo '<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="alert alert-' . $type . ' alert-dismissible fade show text-center" role="alert">
                <strong>'. $titel .'</strong> ' . $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>';
            }
        ?>
            <div class="col-sm-12 col-md-6">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Gebruikers / Verkopers</div>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-chart-gebruiker-verkoper"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Niet-Geactiveerde Accounts</div>
                    </div>
                    <div class="card-body text-center">
                    <?php
                    //Geactiveerd, Niet-geactiveerd Pie chart
                    $query = "SELECT COUNT(Gebruikersnaam) as Aantal FROM Gebruiker WHERE Geactiveerd = '0'";
                    $sql = $dbh->prepare($query);
                    $sql->execute();
                    $resultaat = $sql->fetch(PDO::FETCH_ASSOC);
                    $aantalnietgeactiveerd = $resultaat['Aantal'];
                    ?>
                    <h1><?=$aantalnietgeactiveerd?></h1>
                    <a href="actions/verwijdergebruiker_action.php" class="btn btn-primary">Opschonen</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Gemiddelde aantal veilingen dat geplaatst wordt per dag</div>
                    </div>
                    <div class="card-body text-center">
                    <?php
                    //Geactiveerd, Niet-geactiveerd Pie chart
                    $query = "SELECT AVG(Aantal) as Aantal
                    FROM (SELECT COUNT(Voorwerpnummer) as Aantal
                    FROM Voorwerp
                    GROUP BY LooptijdbeginDag) AVG_table";
                    $sql = $dbh->prepare($query);
                    $sql->execute();
                    $resultaat = $sql->fetch(PDO::FETCH_ASSOC);
                    $gemaantal = $resultaat['Aantal'];
                    ?>
                    <h1><?=$gemaantal?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Aantal veilingen per land</div>
                    </div>
                    <div class="card-body">
                        <canvas id="bar-chart-aantal-veilingen"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Aantal gebruikers per land</div>
                    </div>
                    <div class="card-body">
                        <canvas id="bar-chart-aantal-gebruikers"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<?php
//Gebruiker, Verkoper Pie chart
$query = "SELECT COUNT(*) as aantal FROM Verkoper";
$sql = $dbh->prepare($query);
$sql->execute();
$resultaat = $sql->fetch(PDO::FETCH_ASSOC);
$aantalverkopers = $resultaat['aantal'];

$query = "SELECT COUNT(Gebruikersnaam) as aantal FROM Gebruiker WHERE Gebruikersnaam NOT IN (SELECT Gebruiker FROM Verkoper)";
$sql = $dbh->prepare($query);
$sql->execute();
$resultaat = $sql->fetch(PDO::FETCH_ASSOC);
$aantalgebruikers = $resultaat['aantal'];
?>

<script>

new Chart(document.getElementById("pie-chart-gebruiker-verkoper"), {
    type: 'doughnut',
    data: {
      labels: ["Gebruikers", "Verkopers"],
      datasets: [{
        label: "Aantal",
        backgroundColor: ["#3e95cd", "#8e5ea2"],
        data: [<?=$aantalgebruikers?>,<?=$aantalverkopers?>]
      }]
    },
    options: {
    }
});
</script>

<?php
//Aantalveilingen
$query = "SELECT Gebruiker.Land, COUNT(Voorwerpnummer) AS Aantalveilingen 
FROM Voorwerp 
INNER JOIN Gebruiker 
ON Voorwerp.Verkoper = Gebruiker.Gebruikersnaam 
GROUP BY Gebruiker.Land
ORDER BY Gebruiker.Land";
$sql = $dbh->prepare($query);
$sql->execute();
$resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$kleuren = "";
foreach($resultaat as $key => $value){
    $kleuren .= '"#' . random_color() . '", ';
  } 
?>

<script>

new Chart(document.getElementById("bar-chart-aantal-veilingen"), {
    type: 'horizontalBar',
    data: {
      labels: [<?php 
      foreach($resultaat as $key => $value){
        echo '"' . $value['Land'] . '", ';
      } 
      ?>],
      datasets: [
        {
          label: "Aantal veilingen per land",
          backgroundColor: [<?=$kleuren?>],
          data: [<?php 
      foreach($resultaat as $key => $value){
        echo $value['Aantalveilingen'] . ", ";
      } 
      ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
    }
});

</script>

<?php 
  //Aantalgebruiks
  $query = "SELECT Gebruiker.Land, COUNT(Gebruikersnaam) as Aantalgebruikers 
  FROM Gebruiker 
  GROUP BY Gebruiker.Land
  ORDER BY Gebruiker.Land";
  $sql = $dbh->prepare($query);
  $sql->execute();
  $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
    
  $kleuren = "";
    foreach($resultaat as $key => $value){
        $kleuren .= '"#' . random_color() . '", ';
    }
?>

<script>
    
    new Chart(document.getElementById("bar-chart-aantal-gebruikers"), {
    type: 'horizontalBar',
    data: {
      labels: [<?php 
      foreach($resultaat as $key => $value){
        echo '"' . $value['Land'] . '", ';
      } 
      ?>],
      datasets: [
        {
          label: "Aantal gebruikers per land",
          backgroundColor: [<?=$kleuren?>],
          data: [<?php 
      foreach($resultaat as $key => $value){
        echo $value['Aantalgebruikers'] . ", ";
      } 
      ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
    }
});

</script>