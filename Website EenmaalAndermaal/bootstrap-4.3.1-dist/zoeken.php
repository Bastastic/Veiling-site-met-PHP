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
			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container">

								<div class="row">
									<aside class="col-sm-6">



										<div class="card">
											<article class="card-group-item">
												<header class="card-header">
													<h6 class="title">Brands </h6>
												</header>
												<div class="filter-content">
													<div class="card-body">
														<form>
															<label class="form-check">
																<input class="form-check-input" type="checkbox" value="">
																<span class="form-check-label">
																	Mersedes Benz
																</span>
															</label> <!-- form-check.// -->
															<label class="form-check">
																<input class="form-check-input" type="checkbox" value="">
																<span class="form-check-label">
																	Nissan Altima
																</span>
															</label> <!-- form-check.// -->
															<label class="form-check">
																<input class="form-check-input" type="checkbox" value="">
																<span class="form-check-label">
																	Another Brand
																</span>
															</label> <!-- form-check.// -->
														</form>

													</div> <!-- card-body.// -->
												</div>
											</article> <!-- card-group-item.// -->

											<article class="card-group-item">
												<header class="card-header">
													<h6 class="title">Choose type </h6>
												</header>
												<div class="filter-content">
													<div class="card-body">
														<label class="form-check">
															<input class="form-check-input" type="radio" name="exampleRadio" value="">
															<span class="form-check-label">
																First hand items
															</span>
														</label>
														<label class="form-check">
															<input class="form-check-input" type="radio" name="exampleRadio" value="">
															<span class="form-check-label">
																Brand new items
															</span>
														</label>
														<label class="form-check">
															<input class="form-check-input" type="radio" name="exampleRadio" value="">
															<span class="form-check-label">
																Some other option
															</span>
														</label>
													</div> <!-- card-body.// -->
												</div>
											</article> <!-- card-group-item.// -->
										</div> <!-- card.// -->




									</aside> <!-- col.// -->
									<aside class="col-sm-6">
										<?php
	if(isset($_GET['cat'])) {
		echo '
		<div class="card">
			<article class="card-group-item">
				<header class="card-header"><h6 class="title">Subcategorie&euml;n</h6></header>
				<div class="filter-content">
					<div class="list-group list-group-flush">';
							function Rubrieken($parent, $margin){
								global $dbh;
								$q = $dbh->prepare("SELECT * FROM Rubriek WHERE Hoofdrubriek=$parent");
								$q->execute();
								$q_fetchAll = $q->fetchAll();
								for($i = 0; $i < count($q_fetchAll); $i++){
									echo '
									<label> '
										. $margin . '<input type="radio" class="filled-in" value="' . $q_fetchAll[$i]['Rubrieknummer'] . '">
											<span>' . $q_fetchAll[$i]['Rubrieknaam'] . '</span>
										</label>';
								}
							}
							Rubrieken($_GET['cat'], '&nbsp;&nbsp;');
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
							function Rubrieken($parent = -1, $margin = ''){
								global $dbh;
								$q = $dbh->prepare("SELECT * FROM Rubriek WHERE Hoofdrubriek=$parent");
								$q->execute();
								$q_fetchAll = $q->fetchAll();
								for($i = 0; $i < count($q_fetchAll); $i++){
									echo '
									<label>
									<input type="radio" class="filled-in" value="' . $q_fetchAll[$i]['Rubrieknummer'] . '">
											<span>' . $q_fetchAll[$i]['Rubrieknaam'] . '</span>
										</label>';
								}
							}
							Rubrieken();
		echo '</div>
				</div>
			</article>';
	}
?>


										<article class="card-group-item">
											<header class="card-header">
												<h6 class="title">Color check</h6>
											</header>
											<div class="filter-content">
												<div class="card-body">
													<label class="btn btn-danger">
														<input class="" type="checkbox" name="myradio" value="">
														<span class="form-check-label">Red</span>
													</label>
													<label class="btn btn-success">
														<input class="" type="checkbox" name="myradio" value="">
														<span class="form-check-label">Green</span>
													</label>
													<label class="btn btn-primary">
														<input class="" type="checkbox" name="myradio" value="">
														<span class="form-check-label">Blue</span>
													</label>
												</div> <!-- card-body.// -->
											</div>
										</article> <!-- card-group-item.// -->
								</div> <!-- card.// -->



								</aside> <!-- col.// -->
								<aside class="col-sm-6">




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
															<input type="number" class="form-control" id="inputEmail4" placeholder="$0">
														</div>
														<div class="form-group col-md-6 text-right">
															<label>Max</label>
															<input type="number" class="form-control" placeholder="$1,0000">
														</div>
													</div>
												</div> <!-- card-body.// -->
											</div>
										</article> <!-- card-group-item.// -->
										<article class="card-group-item">
											<header class="card-header">
												<h6 class="title">Selection </h6>
											</header>
											<div class="filter-content">
												<div class="card-body">
													<div class="custom-control custom-checkbox">
														<span class="float-right badge badge-light round">52</span>
														<input type="checkbox" class="custom-control-input" id="Check1">
														<label class="custom-control-label" for="Check1">Samsung</label>
													</div> <!-- form-check.// -->

													<div class="custom-control custom-checkbox">
														<span class="float-right badge badge-light round">132</span>
														<input type="checkbox" class="custom-control-input" id="Check2">
														<label class="custom-control-label" for="Check2">Black berry</label>
													</div> <!-- form-check.// -->

													<div class="custom-control custom-checkbox">
														<span class="float-right badge badge-light round">17</span>
														<input type="checkbox" class="custom-control-input" id="Check3">
														<label class="custom-control-label" for="Check3">Samsung</label>
													</div> <!-- form-check.// -->

													<div class="custom-control custom-checkbox">
														<span class="float-right badge badge-light round">7</span>
														<input type="checkbox" class="custom-control-input" id="Check4">
														<label class="custom-control-label" for="Check4">Other Brand</label>
													</div> <!-- form-check.// -->
												</div> <!-- card-body.// -->
											</div>
										</article> <!-- card-group-item.// -->
									</div> <!-- card.// -->



								</aside> <!-- col.// -->
							</div> <!-- row.// -->

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
						<button type="button" class="btn btn-primary">Opslaan</button>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
                if (isset($_GET['cat']) && isset($_GET['zoeken'])) {
                    $trefwoord = strval($_GET['zoeken']);
                    $cat = $_GET['cat'];
                    $sql = $dbh->prepare(
                        "SELECT TOP(50) voorwerp, voorwerpnummer, titel, beschrijving, startprijs, looptijdeindedag, looptijdeindetijdstip 
                        FROM Voorwerp, Voorwerp_in_Rubriek 
                        WHERE Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
                        AND 
												(Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau in (
																SELECT Rubrieknummer 
																FROM Rubriek
																WHERE Hoofdrubriek = :cat)
												OR
												(Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau in (
														SELECT Rubrieknummer 
														FROM Rubriek
														WHERE Hoofdrubriek = :cat)
												OR
														Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau = :catSub
														)
                        AND titel LIKE CONCAT('%', :trefwoord, '%')"
                    );
                    $sql->execute(['cat' => $cat,  'catSub' => $cat, 'trefwoord' => $trefwoord]);
                    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $aantal = $sql->rowCount();
                    if ($aantal < 1) {
                        echo '<p class="ml-4">Geen producten gevonden</p>';
                    }
                } elseif (isset($_GET['cat'])) {
                        $cat = $_GET['cat'];

                        $sql = $dbh->prepare(
                            "SELECT TOP (50) voorwerp, voorwerpnummer, titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip 
                            FROM Voorwerp, Voorwerp_in_Rubriek 
                            WHERE Voorwerp.voorwerpnummer=Voorwerp_in_Rubriek.Voorwerp 
                            AND (Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau in (
																SELECT Rubrieknummer 
																FROM Rubriek
																WHERE Hoofdrubriek = :cat)
														OR
														Voorwerp_in_Rubriek.Rubriek_op_Laagste_Niveau = :catSub
														)"
                        );
                        $sql->execute(['cat' => $cat, 'catSub' => $cat]);
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    } elseif (isset($_GET['zoeken'])) {
                        $trefwoord = strval($_GET['zoeken']);
                        $sql = $dbh->prepare(
                            "SELECT TOP (50) voorwerpnummer, titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip 
                            FROM Voorwerp 
                            WHERE titel LIKE CONCAT('%', :trefwoord, '%')"
                        );
                        $sql->execute(['trefwoord' => $trefwoord]);
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $sql = $dbh->prepare(
                            "SELECT voorwerpnummer, titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip 
                            FROM Voorwerp"
                        );
                        $sql->execute();
                        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                    foreach ($result as $key => $value) {
                        $afgelopen = 'Veiling afgelopen!';
                        $voorwerpnummer = $value['voorwerpnummer'];
                        $titel = $value['titel'];
												$bescrhijving = $value['beschrijving'];
												$bescrhijving = substr($bescrhijving,0, 200);
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

                        echo "<div class='col-xs-12 col-sm-12 col-md-6' style='padding-top: 20px; cursor: pointer'
                        onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . $voorwerpnummer . "';\"		>
                        <div class='image-flip' ontouchstart='this.classList.toggle('hover');'>
                            <div class='mainflip'>
                                <div class='frontside'>
                                    <div class='card'>
                                        <div class='card-body text-center'>
                                            <p><img class=' img-fluid' src='http://iproject15.icasites.nl/pics/dt_1_".$voorwerpnummer.".jpg' alt='advertentie afbeelding'>
                                            </p>
                                            <h4>$titel</h4>
                                            <p> $bescrhijving...</p>
                                            <h5>€$hoogstebod</h5>
																						<p id='$voorwerpnummer'></p>
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
                ?>
		</div>
		<br>
		<br>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<?php

										$sql = $dbh->prepare("SELECT COUNT (Voorwerpnummer) AS Aantal FROM Voorwerp");
										$sql->execute();
										$result = $sql->fetchAll(PDO::FETCH_ASSOC);

										foreach ($result as $key => $value) {
												$Aantal = $value['Aantal'];
												$AantalPaginas = $Aantal / 30;
												for ($x = 0; $x <= $AantalPaginas; $x++) {
													echo "<li class='page-item'><a class='page-link' href='#'>". $x ."</a></li>";
											} 
										}
										?>
				<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		</div>
	</section>
</body>
<?php include 'includes/footer.html'; ?>

</html>