<?php
    require_once '../php/connectDB.php';
    session_start();
    $gebruikersnaam = $_SESSION['userID'];

    // hier wordt een check uitgevoerd op de ingevulde gegevens om te kijken of ze juist zijn
    include '../php/phpcreditcard.php';
    include '../php/IBANcheck.php';

    if ((isset($_POST['IBAN']) && $_POST['IBAN'] != "") && (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "")) {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];
        $ccNummer = $_POST['ccNummer'];

        if (isValidIBAN($IBAN) == true && check_cc($ccNummer) == true) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, :banknaam, :IBAN, 'In afwachting', :ccNummer)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'banknaam' => $banknaam, 'IBAN' => $IBAN, 'ccNummer' => $ccNummer]);

            header('Location: ../profiel.php?succ=3');
        } else {
            header('Location: ../profiel.php?errc=4');
        }
    } elseif (isset($_POST['IBAN']) && $_POST['IBAN'] != "") {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];

        if (isValidIBAN($IBAN)) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, :banknaam, :IBAN, 'In afwachting', null)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'banknaam' => $banknaam, 'IBAN' => $IBAN]);

            header('Location: ../profiel.php?succ=3');
        } else {
            header('Location: ../profiel.php?errc=4');
        }
    } elseif (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "") {
        $ccNummer = $_POST['ccNummer'];

        if (check_cc($ccNummer)) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, null, null, 'In afwachting', :ccNummer)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'ccNummer' => $ccNummer]);

            header('Location: ../profiel.php?succ=3');
        } else {
            header('Location: ../profiel.php?errc=4');
        }
    }
?>