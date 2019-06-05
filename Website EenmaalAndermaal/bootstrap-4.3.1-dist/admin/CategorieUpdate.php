<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php'; ?>
    <title>Rubrieken</title>
</head>

    <?php 
    include 'includes/sidebar.php' ;

    if (isset($_GET['errc'])) {
        $type = 'danger';
        $titel = 'Sorry!';
        if ($_GET['errc'] == '1') {
            $msg = 'Deze rubriek heeft subrubrieken, verwijder alstublieft eerst alle subrubrieken.';
        } else if ($_GET['errc'] == '2') {
            $msg = 'Dit rubrieknummer is al in gebruik.';
        } else if ($_GET['errc'] == '3') {
            $msg = 'Er is iets fout gegaan.';
        }
    }
    if (isset($_GET['succ'])) {
        $type = 'success';
        $titel = 'Top!';
        if ($_GET['succ'] == '1') {
            $msg = 'De rubriek is succesvol verwijderd';
        } else if ($_GET['succ'] == '2') {
            $msg = 'De rubriek is succesvol geüpdatet';
        } else if ($_GET['succ'] == '3') {
            $msg = 'De nieuwe rubriek is succesvol toegevoegd';
        }
    }
    ?>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="container">
                        <h1 class="dash-title">Rubrieken</h1>
                        <?php
                        if (isset($_GET['cat']) && $_GET['cat'] != "") { //Haalt subcategorieën op van de categorie waarin gezocht is
                            $cat = $_GET['cat'];
                            $sql = $dbh->prepare("SELECT *
                                                FROM Rubriek 
                                                where Hoofdrubriek = :cat
                                                ORDER BY Hoofdrubriek, Volgnr
                            ");
                            $sql->execute(['cat' => $cat]);
                            $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                        } else { //Haalt de hoofdcategorieën op
                            $sql = $dbh->prepare("SELECT *
                                            FROM Rubriek 
                                            where Hoofdrubriek = -1
                                            ORDER BY Volgnr, Rubrieknummer
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
                                <table class="table table-hover table-in-card">
                                    <thead>
                                        <tr>
                                            <th scope="col">Rubrieknr</th>
                                            <th scope="col">Rubrieknaam</th>
                                            <th scope="col">Hoofdrubriek</th>
                                            <th scope="col">Volgnr</th>
                                            <th scope="col">Update</th>
                                            <form method='POST' action='actions/rubriekaction.php'>
                                            <th scope="col">Verwijder</th>
                                            </form>

                                            <?php
                                            if (isset($_GET['cat']) && $_GET['cat'] != "") {
                                                echo '<th scope="col"><input onclick="goBack()" type="submit" style="width:100%" class="btn btn-secondary" name="action" value="Drill up"></th>';
                                            } else {
                                                echo '<th scope="col">Drill</th>';
                                            }
                                            ?>
                                            <script>
                                                function goBack() {
                                                window.history.back();
                                                }
                                            </script>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <!-- nieuwe rubriek toevoegen -->
                                            <tr><form method='POST' action='actions/rubriekaction.php'>
                                            <div>
                                                <td><input type='number' class='form-control' name='Rubrieknummer' placeholder='...' require min='1' max='2147483646'></td>
                                                <td><input style='width:350px' class='form-control' name='Rubrieknaam' placeholder='...' require maxlength='50'></td>
                                                <td><input type='number' class='form-control' name='Hoofdrubriek' placeholder='...' require min='-1' max='2147483646'></td>
                                                <td><input type='number' class='form-control' name='Volgnr' placeholder='...' require min='1' max='2147483646'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-info' name='action' value='Nieuw'></td>
                                                <td></td>
                                                <td></td>
                                            </div>
                                            </form></tr>

                                        <?php
                                        foreach ($resultaat as $rubriek) {
                                            echo  "<tr><form method='POST' action='actions/rubriekaction.php'>
                                            <div>
                                                <td><input type='number' class='form-control' name='Rubrieknummer' value='" . $rubriek['Rubrieknummer'] . "' min='1' max='2147483646'></td>
                                                <td><input style='width:350px' class='form-control' name='Rubrieknaam' value='" . $rubriek['Rubrieknaam'] . "' maxlength='50'></td>
                                                <td><input type='number' class='form-control' name='Hoofdrubriek' value='" . $rubriek['Hoofdrubriek'] . "' min='-1' max='2147483646'></td>
                                                <td><input type='number' class='form-control' name='Volgnr' value='" . $rubriek['Volgnr'] . "' min='1' max='2147483646'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-info' name='action' value='Update'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-primary' name='action' value='Verwijder' onclick='return validateForm()'></td>
                                                <td><input type='submit' style='width:100%' class='btn btn-secondary' name='action' value='Drill down'></td>
                                            </div>  
                                            <input type='hidden' class='' name='originalrub' value='" . $rubriek['Rubrieknummer'] . "'> 
                                            </form>
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <script>
                                    function validateForm() {
                                        if (confirm("Weet u zeker dat u deze rubriek wilt verwijderen")) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</html>