<br>
<div class="container">
    <?php
    $sqlHoofd = $dbh->prepare("SELECT * FROM Rubriek WHERE HoofdRubriek = -1 ORDER BY HoofdRubriek");
    $sqlHoofd->execute();
    $resultaatHoofd = $sqlHoofd->fetchAll(PDO::FETCH_NUM);
    $first = true;
        if ($resultaatHoofd) {
            $kolommen = 0;
            for ($i = 0; $i < count($resultaatHoofd); $i++) {
                $rubrieknummer = $resultaatHoofd[$i][0];
                $rubrieknaam = $resultaatHoofd[$i][1];
                $hoofdrubriek = $resultaatHoofd[$i][2];

                if ($kolommen % 3 == 0 && $first == true) {
                    $first = false;
                    $kolommen++;
                    echo "<div class='row'>";
                } else if ($kolommen % 3 == 0){
                    $kolommen++;
                    echo "</div><div class='row'>";
                }

                echo "
                <div class='col-md-4 col-sm-6 col-xs-12'>
                    <div class='card rounded-0 bg-white border-primary card-header'>
                        <input class='form-check-input ml-1' type='radio' name='cat' id='catRadio$rubrieknummer' value='$rubrieknummer' >
                        <label class='form-check-label ml-4' for='catRadio$rubrieknummer'>
                            $rubrieknaam
                        </label>
                    </div>
                </div>
                ";
            }
        }
    ?>
    </div>
    </div>
    </div>
    
</div>
<br>