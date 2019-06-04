<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Rubrieken</title>
</head>

<body>
    <?php include 'includes/sidebar.php' ?>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="container">
                        <h1 class="dash-title">Rubrieken</h1>
                        <!-- put your rows / columns here -->

                        <?php
                        $sql = $dbh->prepare("
                            SELECT *
                            FROM Rubriek 
                            ORDER BY Hoofdrubriek, Volgnr
                        ");
                        $sql->execute();
                        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div class="row mb-1">
                            <p class="col-1">Rubrieknr</p>
                            <p class="col-5">Rubrieknaam</p>
                            <p class="col-2">Hoofdrubriek</p>
                            <p class="col-1">Volgnr</p>
                            <button class='col-2 btn btn-primary ml-2'>Nieuw</button>
                        </div>

                        <?php
                        foreach ($resultaat as $rubriek)
                        echo "
                        <div class='row mb-1'>
                            <input class='col-1' value='" . $rubriek['Rubrieknummer'] . "'>
                            <input class='col-5' value='" . $rubriek['Rubrieknaam'] . "'>
                            <input class='col-2' value='" . $rubriek['Hoofdrubriek'] . "'>
                            <input class='col-1' value='" . $rubriek['Volgnr'] . "'>
                            <button class='col-1 btn btn-info ml-2'>Update</button>
                            <button class='col-1 btn btn-primary'>Verwijder</button>
                        </div>
    	                ";
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>