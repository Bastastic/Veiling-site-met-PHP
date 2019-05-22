<br>
<div class="container">
    <div id="accordion">
        <?php
        $sql = $dbh->prepare("SELECT * from Rubriek order by Rubrieknummer");
        $sql->execute();
        $resultaat = $sql->fetchAll(PDO::FETCH_NUM);

            if ($resultaat) {
                $first = true;
                $kolommen = 0;

                for ($i = 0; $i < count($resultaat); $i++){
                    $rubrieknummer = $resultaat[$i][0];
                    $rubrieknaam = $resultaat[$i][1];
                    $hoofdrubriek = $resultaat[$i][2];
                    $volgnr = $resultaat[$i][3];

                    if ($hoofdrubriek == -1) {
                        if ($first == true) {
                            $first = false;
                            echo "<div class='row'>";
                            echo "
                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                    <div class='card rounded-0'>
                                        <button type='button' id='h$rubrieknummer' class='bg-white border-primary rounded-0 card-header btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            <input class='form-check-input' type='radio' name='cat' id='catRadio$rubrieknummer' value='$rubrieknummer' >
                                            <label class='form-check-label' for='catRadio$rubrieknummer'>
                                                $rubrieknaam
                                            </label>
                                        </button>
                                        <div id='c$rubrieknummer' class='collapse hide' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                        <div class='card-body'>
                                        <ul class='list-unstyled'>
                            ";
                        } else {
                            if ($kolommen % 3 == 0) {
                                echo "</div><div class='row'>";
                            }
                            echo "
                            </div>
                            </ul>

                            </div>
                            </div>
                            </div>
                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                    <div class='card rounded-0'>
                                        <button type='button' id='h$rubrieknummer' class='bg-white border-primary rounded-0 card-header btn btn-link' data-toggle='collapse' data-target='#c$rubrieknummer' aria-expanded='true' aria-controls='c$rubrieknummer'>
                                            <input class='form-check-input' type='radio' name='cat' id='catRadio$rubrieknummer' value='$rubrieknummer'>
                                            <label class='form-check-label' for='catRadio$rubrieknummer'>
                                                $rubrieknaam
                                            </label>                                        </button>
                                        <div id='c$rubrieknummer' class='collapse hide' aria-labelledby='h$rubrieknummer' data-parent='#accordion'>
                                        <div class='card-body'>
                                        <ul class='list-unstyled'>
                            ";
                        }
                    } else {
                        echo "
                            <li>
                            <input class='form-check-input ml-2' type='radio' name='cat' id='catRadio$rubrieknummer' value='$rubrieknummer'>
                                <label class='form-check-label ml-4' for='catRadio$rubrieknummer'>" . str_repeat("&nbsp;&nbsp;", $volgnr) . "$rubrieknaam
                                </label>
                            </li>
                        ";
                    }
                }
            }
            else {
                echo "<p>We hebben niets gevonden wat lijkt op je zoekcriteria :(</p>";
            }
        ?>

    </div>
    </div>
    </div>
    </div>
    </ul>

    </div>
    </div>
    </div>
    </div>
<br>