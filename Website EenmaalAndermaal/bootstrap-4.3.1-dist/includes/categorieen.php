<br>
    <!-- <div class="container">
    <div id="accordion"> -->
    <?php
        function Rubrieken($parent = -1, $margin = '') {
            global $dbh;
            $q = $dbh->prepare("SELECT * FROM Rubriek WHERE Hoofdrubriek=$parent");
            $q->execute();
            $q_fetchAll = $q->fetchAll();
            for($i = 0; $i < count($q_fetchAll); $i++){
                echo '<label> '
                    . $margin . '<input type="checkbox" class="filled-in" value="' . $q_fetchAll[$i]['Rubrieknummer'] . '">
                    <span>' . $q_fetchAll[$i]['Rubrieknaam'] . '</span>
                    </label><br>';
                Rubrieken($q_fetchAll[$i]['Rubrieknummer'], $margin . '&nbsp; &nbsp; &nbsp; &nbsp;');
            }
        }
        Rubrieken();
    ?>
    <!-- </div>
    </div> -->
<br>