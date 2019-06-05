<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Rubrieken</title>
</head>
    <?php include 'includes/sidebar.php' ?>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="container">
                        <h1 class="dash-title">Rubrieken</h1>
                        <!-- put your rows / columns here -->
                        <?php
                        //neemt top 100 voor sneller testen
                        if (isset($_GET['cat'])) {
                            $cat = $_GET['cat'];
                            $sql = $dbh->prepare("SELECT *
                                                FROM Rubriek 
                                                where Hoofdrubriek = $cat
                                                ORDER BY Hoofdrubriek, Volgnr
                            ");
                            $sql->execute();
                            $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                        } else {
                            $sql = $dbh->prepare("SELECT *
                                            FROM Rubriek 
                                            where Hoofdrubriek = -1
                                            ORDER BY Hoofdrubriek, Volgnr
                            ");
                            $sql->execute();
                            $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                        }
                        ?>

                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="spur-card-title">Rubrieken</div>
                            </div>
                            <div class="card-body ">
                                <table class="table table-hover table-in-card">
                                    <thead>
                                        <tr>
                                            <th scope="col">Rubrieknr</th>
                                            <th scope="col">Rubrieknaam</th>
                                            <th scope="col">Hoofdrubriek</th>
                                            <th scope="col">Volgnr</th>
                                            <th scope="col">Update</th>
                                            <th scope="col"><input type='submit' style='width:100%' class='btn btn-primary' name='action' value='Nieuw'></th>
                                            <th scope="col"><input type='submit' style='width:100%' class='btn btn-secondary' name='action' value='Drill up'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($resultaat as $rubriek) {
                                            echo  "<tr><form method='POST' action='actions/rubriekaction.php'>
                                            <div>
                                                <td><input class='' name='Rubrieknummer' value='" . $rubriek['Rubrieknummer'] . "'></td>
                                                <td><input class='' name='Rubrieknaam' value='" . $rubriek['Rubrieknaam'] . "'></td>
                                                <td><input class='' name='Hoofdrubriek' value='" . $rubriek['Hoofdrubriek'] . "'></td>
                                                <td><input class='' name='Volgnr' value='" . $rubriek['Volgnr'] . "'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-info' name='action' value='Update'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-primary' name='action' value='Verwijder'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-secondary' name='action' value='Drill down'></td>

                                            </div>  
                                            <input type='hidden' class='' name='originalrub' value='" . $rubriek['Rubrieknummer'] . "'> 
                                            </form>
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       

                        <!-- <div class="row mb-1">
                            <p class="col-1">Rubrieknr</p>
                            <p class="col-5">Rubrieknaam</p>
                            <p class="col-2">Hoofdrubriek</p>
                            <p class="col-1">Volgnr</p>
                            <button class='col-2 btn btn-primary ml-2'>Nieuw</button>
                        </div>

                        <?php
                        foreach ($resultaat as $rubriek) {
                        echo "
                            <div class='row mb-1'>
                                <input class='col-1' value='" . $rubriek['Rubrieknummer'] . "'>
                                <input class='col-5' value='" . $rubriek['Rubrieknaam'] . "'>
                                <input class='col-2' value='" . $rubriek['Hoofdrubriek'] . "'>
                                <input class='col-1' value='" . $rubriek['Volgnr'] . "'>

                                <input type='button' class='col-1 btn btn-info ml-2' name='action' value='Update'>
                                <input type='button' class='col-1 btn btn-primary' name='action' value='Verwijder'>
                            </div>
                        </form>
                        ";}
                        ?> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

</html>