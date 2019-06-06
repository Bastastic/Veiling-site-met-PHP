<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Dashboard</title>
</head>

<?php include 'includes/sidebar.php' ?>

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Grafieken</h1>
        <div class="row">
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
            <div class="col-sm-12 col-md-6">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-title">Geactiveerde / Niet-Geactiveerde Accounts</div>
                    </div>
                    <div class="card-body">
                    <canvas id="pie-chart-geactiveerd-nietgeactiveerd"></canvas>
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
    type: 'pie',
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
//Geactiveerd, Niet-geactiveerd Pie chart
$query = "SELECT Geactiveerd, COUNT(Gebruikersnaam) as aantal FROM Gebruiker group by Geactiveerd";
$sql = $dbh->prepare($query);
$sql->execute();
$resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
$aantalnietgeactiveerd = $resultaat[0]['aantal'];
$aantalgeactiveerd = $resultaat[1]['aantal'];
?>

<script>
new Chart(document.getElementById("pie-chart-geactiveerd-nietgeactiveerd"), {
    type: 'pie',
    data: {
      labels: ["Niet-Geactiveerd", "Geactiveerd"],
      datasets: [{
        label: "Aantal",
        backgroundColor: ["#3e95cd", "#8e5ea2"],
        data: [<?=$aantalnietgeactiveerd?>,<?=$aantalgeactiveerd?>]
      }]
    },
    options: {
    }
});

</script>

<?php
//Geactiveerd, Niet-geactiveerd Pie chart
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
    $query = "SELECT Gebruiker.Land, COUNT(Gebruikersnaam) as Aantalgebruikers 
    FROM Gebruiker 
    GROUP BY Gebruiker.Land
    ORDER BY Gebruiker.Land";
    $sql = $dbh->prepare($query);
    $sql->execute();
    $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
    
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