<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <link rel="icon" href="../../../../favicon.ico">
    <title>Meervan</title>
</head>

<?php
     require_once 'php/connectDB.php'; 
     include 'includes/header.php'; 
?>

<body style="overflow-x:hidden">
    <section id="team" class="pb-5">
        <div class="container">
            <br>
            <h2>Veilingen van <?=strip_tags($_GET['verkoper'])?></h2>
            <div class="row">
                <?php
                // hier worden alle veilingen van een bepaalde verkoper gehaald. Als er geen zijn komt er niks.
                if (isset($_GET['verkoper'])) {
                    $verkoper = strip_tags($_GET['verkoper']);
                    $sql = $dbh->prepare(
                        "SELECT voorwerpnummer, titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip 
                        FROM Voorwerp
                        WHERE cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
                        AND Verkoper LIKE :verkoper
                        ORDER BY LooptijdeindeDag DESC, LooptijdeindeTijdstip DESC"
                    );
                    $sql->execute(['verkoper' => $verkoper]);
                    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $aantal = $sql->rowCount();
                    if ($aantal < 1) {
                        echo '<p class="ml-4">Geen producten gevonden</p>';
                    }
                    // hiermee worden er meerdere gehaald als er meerdere zijn.
                    foreach ($result as $key => $value) {
                        $afgelopen = 'Veiling afgelopen!';
                        $voorwerpnummer = $value['voorwerpnummer'];
                        $titel = $value['titel'];
                        $bescrhijving = $value['beschrijving'];
                        $bescrhijving = substr($bescrhijving, 0, 200);
                        $startprijs = $value['startprijs'];
                        $eindedag = $value['LooptijdeindeDag'];
                        $eindetijdstip = $value['LooptijdeindeTijdstip'];

                        $sql = $dbh->prepare(
                            'SELECT bodbedrag
														FROM Bod, Voorwerp
														WHERE Bod.voorwerp = Voorwerp.voorwerpnummer
														AND voorwerpnummer = :voorwerpnummer
														ORDER BY bodbedrag DESC'
                                                );
                        $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
                        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                        $hoogstebod = $startprijs;
                        if ($resultaat) {
                            $hoogstebod = $resultaat[0]['bodbedrag'];
                        }

                        $query = "SELECT TOP 1 Filenaam FROM Bestand WHERE Voorwerp = $voorwerpnummer";
                        $sql = $dbh->prepare($query);
                        $sql->execute();
                        $fotos = $sql->fetch(PDO::FETCH_ASSOC);
                        $foto = $fotos['Filenaam'];

                        // hier worden alle veilingen laten zien van de betreffende verkoper
                        echo "<div class='col-xs-12 col-sm-12 col-md-6' style='padding-top: 20px; cursor: pointer'
                        onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8') . "';\"		>
                        <div class='image-flip' ontouchstart='this.classList.toggle('hover');'>
                            <div class='mainflip'>
                                <div class='frontside'>
                                    <div class='card'>
                                        <div class='card-body text-center'>
                                            <p><img class=' img-fluid' src='http://iproject15.icasites.nl/".htmlspecialchars($foto, ENT_QUOTES, 'UTF-8')."' alt='advertentie afbeelding'>
                                            </p>
                                            <h4>" . htmlspecialchars($titel, ENT_QUOTES, 'UTF-8'). "</h4>
                                            <p> " . htmlspecialchars($bescrhijving, ENT_QUOTES, 'UTF-8'). "...</p>
                                            <h5>€" . htmlspecialchars($hoogstebod, ENT_QUOTES, 'UTF-8'). "</h5>
										    <p>Nog: <span id='" . htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8'). "'></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
										</div>
										<script>
										var countDownDate$voorwerpnummer = new Date('$eindedag $eindetijdstip').getTime();

										var x = setInterval(function() {

											var now = new Date().getTime();

											var distance = countDownDate$voorwerpnummer - now;

											var days = Math.floor(distance / (1000 * 60 * 60 * 24));
											var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
											var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
											var seconds = Math.floor((distance % (1000 * 60)) / 1000);

											document.getElementById('$voorwerpnummer').innerHTML = days + 'd ' + hours + 'h '
											+ minutes + 'm ' + seconds + 's ';

											if (distance < 0) {
												clearInterval(x);
												document.getElementById('$voorwerpnummer').innerHTML = '$afgelopen';
											}
										}, 1000);
								  </script>";
                    }
                }
                ?>
            </div>
        </div>
    </section>
</body>

<?php include 'includes/footer.php'; ?>

</html>