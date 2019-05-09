<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>EenmaalAndermaal</title>
</head>

<style>
    /* #demo {
        height: 50%;
        width: 50%;
        float: left;
    } */

    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    /* .row {
        padding-left: 2.5%;
        padding-top: 1%;
    } */

    .row h2 {
        font-family: Lobster;
    }

    #ad img {
        width: 100%;
        height: 100%;
    }

    #ad {
        color: white;
        background-color: #ff814f;
        font-family: Lobster;
        padding-left: 1%;
    }
</style>

<?php 
    include 'includes/header.php'; 
    require_once 'php/connectDB.php'; 
?>

<body>

    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-7">
                <div id="demo" class="carousel slide mt-3" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                        <li data-target="#demo" data-slide-to="4"></li>
                        <li data-target="#demo" data-slide-to="5"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="New York">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 mt-2">
                <h2>Omschrijving van de veiling</h2>
                <small>
                    Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                    amet
                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id,
                    lorem.
                    Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
                    Nullam quis
                    ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet
                    nibh.
                    Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
                    quis
                    gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque
                    ut,
                    mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis
                    hendrerit
                    fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    Curae; In ac
                    dui quis mi consectetuer lacinia.
                </small>
            </div>
        </div>
        <div class="row mt-5">
            <?php 
                $sql = $dbh->prepare("select top 12 voorwerpnummer, titel from Voorwerp order by Voorwerpnummer desc");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $key => $value) {
                    $value = $value['titel'];
                    echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>
                    <div id='ad'>
                        <img src='images/placeholder.png' alt='Responsive image'>
                        <p>$value</p>
                    </div>
                </div>";
                }
            ?>
        </div>
    </div>
</body>

<?php include 'includes/footer.php'; ?>

</html>