<br>
<div class="container">
    <?php
    // query om de hoofdcategorieën op te halen
    $sqlHoofd = $dbh->prepare("SELECT * FROM Rubriek WHERE HoofdRubriek = -1 ORDER BY Volgnr");
    $sqlHoofd->execute();
    $resultaatHoofd = $sqlHoofd->fetchAll(PDO::FETCH_NUM);
    $first = true;
        if ($resultaatHoofd) { //checkt of er resultaten zijn
            $kolommen = 0; // houdt bij hoeveel kolommen in een rij gezet zijn
            for ($i = 0; $i < count($resultaatHoofd); $i++) { //loopt elk resultaat af
                $rubrieknummer = $resultaatHoofd[$i][0];
                $rubrieknaam = $resultaatHoofd[$i][1];
                $hoofdrubriek = $resultaatHoofd[$i][2];

                if ($kolommen % 3 == 0 && $first == true) { // maakt een row aan in het begin
                    $first = false;
                    $kolommen++;
                    echo "<div class='row'>";
                } else if ($kolommen % 3 == 0){ // sluit de vorige row en start een nieuwe als er 3 kolommen gemaakt zijn
                    $kolommen++;
                    echo "</div><div class='row'>";
                }

                // maakt de klikbare categorieën om mee te kunnen zoeken
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

    <!-- sluit de overgebleven divs -->
    </div>
    </div>
    </div>
<br>