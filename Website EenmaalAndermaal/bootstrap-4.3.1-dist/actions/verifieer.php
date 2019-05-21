<?php
    if(isset($_POST['controleklik'])){
        if(isset($_POST['code'])){
            $code = $_POST['code'];
            $query = "SELECT COUNT(*)
            FROM Verificatie
            WHERE Verificatiecode = :code";
            $sql = $dbh->prepare($query);
            $sql->execute(['code' => $code]);

            if(count($sql->fetchAll()) > 0){
                $query = "UPDATE Gebruiker
                    SET Geactiveerd = 1
                    FROM Gebruiker
                    JOIN Verificatie
                    ON Gebruiker.Gebruikersnaam = Verificatie.Gebruikersnaam
                    WHERE Verificatiecode = :verificatiecode";
                $sql = $dbh->prepare($query);
                $sql->bindValue(":verificatiecode", $code);
                $sql->execute();
                header('Location: ../profiel.php?succ=1');
            }else{
                header('Location: ../mailverstuurd.php?errc=2');
            }
        }else{
            header('Location: ../mailverstuurd.php?errc=1');
        }
    }

?>