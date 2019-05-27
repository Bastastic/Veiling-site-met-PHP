<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php include 'includes/links.php'; ?>
	<title>Document</title>
</head>

<?php include 'includes/header.php'; 
	if(!isset($_SESSION['userID'])){
		echo '<script>window.location.replace("inloggen.php");</script>';
	}else{
		$query = 'SELECT Gebruikersnaam FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam AND Verkoper = 1';
		$sql = $dbh->prepare($query);
		$sql->execute(['gebruikersnaam' => $_SESSION['userID']]);
		$resultaat = $sql->fetch();
	
		if(!$resultaat){
			echo '<script>window.location.replace("profiel.php");</script>';
		}
	}
?>

<body>
	<h1 class="text-center">Hoofd categorie</h1>
	<form method="POST" class="container w-25" action="veiling-toevoegen.php">
		<?php
											if(isset($_POST['cat'])) {
												echo '
												<div class="card">
													<article class="card-group-item">
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
																	Rubrieken($_POST['cat']);
												echo '</div>
														</div>
													</article>';
											} else {
												echo '
												<div class="card">
													<article class="card-group-item">
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
							
											
						
                                        ?>
		<div class="container text-center">
			<button type="submit" class="btn btn-primary mt-2 mb-5">Volgende stap</button>
		</div>

	</form>
	</div> <!-- card.// -->
	</aside> <!-- col.// -->
	</div> <!-- row.// -->
	</div>
</body>
<?php include 'includes/footer.php';?>

</html>