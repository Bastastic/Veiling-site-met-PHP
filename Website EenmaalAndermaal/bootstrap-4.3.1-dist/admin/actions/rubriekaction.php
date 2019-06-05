<?php
    require '../../php/connectDB.php';

    $rubnr = $_POST['Rubrieknummer'];
    $rubnaam = $_POST['Rubrieknaam'];
    $hoofdrub = $_POST['Hoofdrubriek'];
    $volgnr = $_POST['Volgnr'];
    $originalrub = $_POST['originalrub'];

    if ($_POST['action'] == 'Update') { //als op de update knop is gedrukt:
        //Eerst checken of het ingevulde rubrieknummer niet in gebruik is
        $sql = $dbh->prepare(
            "SELECT *
            FROM Rubriek
            WHERE Rubrieknummer = :rubnr"
        );
        $sql->execute(['rubnr' => $rubnr]);
        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$resultaat || $rubnr == $originalrub) { //als er geen rubriek is met dit rubrieknr of als het rubrieknummer niet verandert is

            //hoodrubriek leeg maken zodat de verwijzing verandert kan worden
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

            header('Location: ../CategorieUpdate.php?succ=2');
        } else if ($resultaat) {
            header('Location: ../CategorieUpdate.php?errc=2');
        } else {
            header('Location: ../CategorieUpdate.php?errc=3');
        }

    } else if ($_POST['action'] == 'Verwijder') { //als op de verwijder knop is gedrukt:
        //Eerst checken of deze categorie subcategorieën heeft
        $sql = $dbh->prepare(
            "SELECT *
            FROM Rubriek
            WHERE Hoofdrubriek = :originalrub"
        );
        $sql->execute(['originalrub' => $originalrub]);
        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

        //als hij geen subcategorieën heeft
        if(!$resultaat) {
            //update de rubrieken waar producten inzitten als deze verwijderd worden
            $sql = $dbh->prepare(
                "UPDATE Voorwerp_in_Rubriek
                SET Rubriek_op_Laagste_Niveau = :Hoofdrub
                WHERE Rubriek_op_Laagste_Niveau = :originalrub"
            );
            $sql->execute(['Hoofdrub' => $hoofdrub, 'originalrub' => $originalrub]);

            //verwijdert de rubriek
            $sql = $dbh->prepare(
                "DELETE FROM Rubriek 
                WHERE Rubrieknummer = :originalrub"
            );

            $sql->execute(['originalrub' => $originalrub]);
            header('Location: ../CategorieUpdate.php?succ=1');
        } else {
            header('Location: ../CategorieUpdate.php?errc=1');
        }
        

    } else if ($_POST['action'] == 'Drill down') { //als op de Drill down knop is gedrukt:
        header("Location: ../CategorieUpdate.php?cat=$originalrub");


    } else if ($_POST['action'] == 'Nieuw') { //Nieuwe rubriek maken:
        //Eerst checken of het ingevulde rubrieknummer niet in gebruik is
        $sql = $dbh->prepare(
            "SELECT *
            FROM Rubriek
            WHERE Rubrieknummer = :rubnr"
        );
        $sql->execute(['rubnr' => $rubnr]);
        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$resultaat) { //als er geen rubriek is met dit rubrieknr
            $sql = $dbh->prepare(
                "INSERT INTO Rubriek VALUES (:rubnr, :rubnaam, :hoofdrub, :volgnr)"
            );
            $sql->execute(['rubnr' => $rubnr, 'rubnaam' => $rubnaam, 'hoofdrub' => $hoofdrub, 'volgnr' => $volgnr]);

            header("Location: ../CategorieUpdate.php?succ=3");
        } else {
            header("Location: ../CategorieUpdate.php?errc=2");
        }

    } else { //als er om andere reden op deze pagina is gekomen:
        header('Location: ../CategorieUpdate.php');
    }
?>