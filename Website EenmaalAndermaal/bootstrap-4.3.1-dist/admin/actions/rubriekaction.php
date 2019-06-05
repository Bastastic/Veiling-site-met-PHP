<?php
    require '../../php/connectDB.php';

    $rubnr = $_POST['Rubrieknummer'];
    $rubnaam = $_POST['Rubrieknaam'];
    $hoofdrub = $_POST['Hoofdrubriek'];
    $volgnr = $_POST['Volgnr'];
    $originalrub = $_POST['originalrub'];

    if ($_POST['action'] == 'Update') { //als op de update knop is gedrukt:
        //Eerst hoodrubriek leeg maken zodat de verwijzing verandert kan worden
        $sql = $dbh->prepare(
            "UPDATE Rubriek
            SET Hoofdrubriek = null
            WHERE Hoofdrubriek = :originalrub"
        );
        $sql->execute(['originalrub' => $originalrub]);


        //update de geselecteerde rubriek
        $sql = $dbh->prepare(
            "UPDATE Rubriek
            SET Rubrieknummer = :rubnr, Rubrieknaam = :rubnaam, Hoofdrubriek = :hoofdrub, Volgnr = :volgnr
            WHERE Rubrieknummer = :originalrub"
        );
        $sql->execute(['rubnr' => $rubnr, 'rubnaam' => $rubnaam, 'hoofdrub' => $hoofdrub, 'volgnr' => $volgnr, 'originalrub' => $originalrub]);

        //update rubnr bij de subcategorieën van de veranderde categorie
        $sql = $dbh->prepare(
            "UPDATE Rubriek
            SET Hoofdrubriek = :rubnr
            WHERE Hoofdrubriek is null 
            AND Rubrieknummer != -1" //niet de ROOT categorie updaten
        );
        $sql->execute(['rubnr' => $rubnr]);

        header('Location: ../CategorieUpdate.php');

    } else if ($_POST['action'] == 'Verwijder') { //als op de update knop is gedrukt:
        $sql = $dbh->prepare(
            "SELECT *
            FROM Voorwerp_in_Rubriek
            WHERE Rubrieknummer = :originalrub"
        );

        $sql->execute(['originalrub' => $originalrub]);
                        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);



        
        $sql = $dbh->prepare(
            "DELETE FROM Rubriek 
            WHERE Rubrieknummer = :originalrub"
        );

        $sql->execute(['originalrub' => $originalrub]);

        header('Location: ../CategorieUpdate.php');

    } else if ($_POST['action'] == 'Drill down') { //als op de Drill knop is gedrukt:
        header("Location: ../CategorieUpdate.php?cat=$originalrub");
    } else { //als er om andere reden op deze pagina is gekomen:
        header('Location: ../CategorieUpdate.php');
    }
?>