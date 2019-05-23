<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php include 'includes/links.php'; ?>
	<link rel="icon" href="../../../../favicon.ico">
	<title>Zoeken</title>
</head>
<?php
     require 'php/connectDB.php';
    ?>


<?php
     include 'includes/header.php';
    ?>

<body style="overflow-x:hidden">
	<section id="team" class="pb-5">
		<div class="container">
			<br>
			<h2>Zoekresultaten</h2>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
				Filters
			</button>

			<!-- Modal -->
			<form action="zoeken.php" method="get">
				<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="container">
									<div class="row">
										<aside class="col-sm-12">
											<div class="card">
												<article class="card-group-item">
													<header class="card-header">
														<h6 class="title">Range input </h6>
													</header>
													<div class="filter-content">
														<div class="card-body">
															<div class="form-row">
																<div class="form-group col-md-6">
																	<label>Min</label>
																	<input type="number" class="form-control"
																		id="prijsMin" name="prijsMin" placeholder="€0"
																		value="0">
																</div>
																<div class="form-group col-md-6 text-right">
																	<label>Max</label>
																	<input type="number" class="form-control"
																		id="prijsMax" name="prijsMax"
																		placeholder="€10.000" value="999999.99">

																</div>
															</div>
														</div> 
													</div>
												</article> <!-- card-group-item.// -->
											</div> <!-- card.// -->

											<?php
											if(isset($_GET['cat'])) {
												echo '
												<div class="card">
													<article class="card-group-item">
														<header class="card-header"><h6 class="title">Subcategorie&euml;n</h6></header>
														<div class="filter-content">
															<div class="list-group list-group-flush">';
															//schrijft de subcategorieën op
																	function Rubrieken($parent) {
																		global $dbh;
																		$q = $dbh->prepare("SELECT * FROM Rubriek WHERE Hoofdrubriek=$parent");
																		$q->execute();
																		$q_fetchAll = $q->fetchAll();
																		for($i = 0; $i < count($q_fetchAll); $i++){
																			echo '
																			<label>
																				<input type="radio" name="cat" class="form-check-input ml-3" value="' . $q_fetchAll[$i]['Rubrieknummer'] . '">
																				<span class="ml-5">' . $q_fetchAll[$i]['Rubrieknaam'] . '</span>
																			</label>';
																		}
																	}
																	Rubrieken($_GET['cat']);
												echo '</div>
														</div>
													</article>';
											} else {
												echo '
												<div class="card">
													<article class="card-group-item">
														<header class="card-header"><h6 class="title">Subcategorie&euml;n</h6></header>
														<div class="filter-content">
															<div class="list-group list-group-flush">';
															function Rubrieken($parent = -1){
																global $dbh;
																$q = $dbh->prepare("SELECT * FROM Rubriek WHERE Hoofdrubriek=$parent");
																$q->execute();
																$q_fetchAll = $q->fetchAll();
																for($i = 0; $i < count($q_fetchAll); $i++){
																	echo '
																	<label>
																		<input type="radio" name="cat" class="form-check-input ml-3" value="' . $q_fetchAll[$i]['Rubrieknummer'] . '">
																		<span class="ml-5">' . $q_fetchAll[$i]['Rubrieknaam'] . '</span>
																	</label>';
																}
															}
															Rubrieken();
												echo '</div>
														</div>
													</article>';
											}
											echo "
											<input type='hidden' name='zoeken' value='" . $_GET['zoeken'] . "'/>
											";
										?>
									</div> <!-- card.// -->
									</aside> <!-- col.// -->
								</div> <!-- row.// -->
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
							<button type="submit" class="btn btn-primary">Opslaan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="row">
			<?php
				if (isset($_GET['prijsMin'])) {
					$prijsMin = $_GET['prijsMin'];
				} else {
					$prijsMin = 0;
				}

				if (isset($_GET['prijsMax'])) {
					$prijsMax = $_GET['prijsMax'];
				} else {
					$prijsMax = 999999.99;
				}
											
				// zorgt dat prijsmin en prijsmax altijd een waarde hebben
                if (isset($_GET['cat']) && isset($_GET['zoeken'])) {
				$trefwoord = strval($_GET['zoeken']);
				$cat = $_GET['cat'];
				
				// checkt of er op het product geboden is
				$bodCheck = $dbh->prepare("SELECT * FROM Bod ");
				$bodCheck->execute();
				$bodCheck_fetchAll = $bodCheck->fetchAll();
				// for($i = 0; $i < count($bodCheck_fetchAll); $i++){
				// 	echo "$bodCheck_fetchAll[$i]['voorwerp']";
				// }

					$sql = $dbh->prepare(
							"SELECT distinct top(50) Voorwerp_in_Rubriek.voorwerp, Rubriek_op_Laagste_Niveau, 
									titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip
									FROM Voorwerp inner join Voorwerp_in_Rubriek
										on Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
									left outer join Bod
										on Bod.Voorwerp=Voorwerp.voorwerpnummer 
									WHERE (Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau in (
											SELECT Rubrieknummer 
											FROM Rubriek
											WHERE Hoofdrubriek = :cat)
									OR
									Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau = :catSub)
									AND titel LIKE CONCAT('%', :trefwoord, '%')
									AND Startprijs > :prijsMin AND Startprijs < :prijsMax
									AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
							");
					$sql->execute(['cat' => $cat, 'catSub' => $cat, 'trefwoord' => $trefwoord, 'prijsMin' => $prijsMin, 'prijsMax' => $prijsMax]);
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
					$aantal = $sql->rowCount();
					if ($aantal < 1) {
							echo '<p class="ml-4">Geen producten gevonden</p>';
					}
                } elseif (isset($_GET['cat'])) {
					$cat = $_GET['cat'];
					$sql = $dbh->prepare(
							"SELECT distinct top(50) Voorwerp_in_Rubriek.voorwerp, Rubriek_op_Laagste_Niveau, 
							titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip
							FROM Voorwerp inner join Voorwerp_in_Rubriek
								on Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
							left outer join Bod
								on Bod.Voorwerp=Voorwerp.voorwerpnummer 
							WHERE (Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau in (
									SELECT Rubrieknummer 
									FROM Rubriek
									WHERE Hoofdrubriek = :cat)
							OR
							Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau = :catSub)
							AND Startprijs > :prijsMin AND Startprijs < :prijsMax
							AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
							");
					$sql->execute(['cat' => $cat, 'catSub' => $cat, 'prijsMin' => $prijsMin, 'prijsMax' => $prijsMax]);
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				} elseif (isset($_GET['zoeken'])) {
					$trefwoord = strval($_GET['zoeken']);
					$sql = $dbh->prepare(
							"SELECT distinct top(50) Voorwerp_in_Rubriek.voorwerp, Rubriek_op_Laagste_Niveau, 
							titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip
							FROM Voorwerp inner join Voorwerp_in_Rubriek
								on Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
							left outer join Bod
								on Bod.Voorwerp=Voorwerp.voorwerpnummer 
							WHERE titel LIKE CONCAT('%', :trefwoord, '%')
							AND Startprijs > :prijsMin AND Startprijs < :prijsMax
							AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
							");
					$sql->execute(['trefwoord' => $trefwoord, 'prijsMin' => $prijsMin, 'prijsMax' => $prijsMax]);
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				} else {
					$sql = $dbh->prepare(
							"SELECT distinct top(50) Voorwerp_in_Rubriek.voorwerp, Rubriek_op_Laagste_Niveau, 
							titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip
							FROM Voorwerp inner join Voorwerp_in_Rubriek
							on Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
							left outer join Bod
							on Bod.Voorwerp=Voorwerp.voorwerpnummer 
							AND Startprijs > :prijsMin AND Startprijs < :prijsMax
							AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
					");
					$sql->execute(['prijsMin' => $prijsMin, 'prijsMax' => $prijsMax]);
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				}
				foreach ($result as $key => $value) {
						$afgelopen = 'Veiling afgelopen!';
						$voorwerpnummer = $value['voorwerp'];
						$titel = $value['titel'];
						$bescrhijving = $value['beschrijving'];
						$bescrhijving = substr($bescrhijving, 0 , 200);
						$startprijs = $value['startprijs'];
						$looptijdeindedag = $value['looptijdeindedag'];
						$looptijdeindetijdstip = $value['looptijdeindetijdstip'];

						$sql = $dbh->prepare(
								'SELECT bodbedrag
								FROM Bod, Voorwerp
								WHERE Bod.voorwerp = Voorwerp.voorwerpnummer
								AND voorwerpnummer = :voorwerpnummer
								ORDER BY bodbedrag DESC');
						$sql->execute(['voorwerpnummer' => $voorwerpnummer]);
						$resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
						$hoogstebod = $startprijs;
						if ($resultaat) {
								$hoogstebod = $resultaat[0]['bodbedrag'];
						}

						echo "<div class='col-xs-12 col-sm-12 col-md-6' style='padding-top: 20px; cursor: pointer'
						onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . $voorwerpnummer . "';\">
							<div class='image-flip' ontouchstart='this.classList.toggle('hover');'>
								<div class='mainflip'>
										<div class='frontside'>
											<div class='card'>
												<div class='card-body text-center'>
												<p><img class=' img-fluid' src='http://iproject15.icasites.nl/pics/dt_1_".$voorwerpnummer.".jpg' alt='advertentie afbeelding'>
												</p>
												<h4>$titel</h4>
												<p>$bescrhijving</p>
												<h5>€$hoogstebod</h5>
												<p id='$voorwerpnummer'></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script>
						var countDownDate$voorwerpnummer = new Date('$looptijdeindedag $looptijdeindetijdstip').getTime();

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
                ?>
            </div>
    </section>
</body>
<?php include 'includes/footer.php'; ?>

</html>