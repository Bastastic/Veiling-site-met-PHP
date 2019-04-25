<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Biedingspagina</title>
</head>

<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .carousel {
        width: 100%;
        height: auto;
    }

    textarea {
        resize: none;
    }
</style>

<?php include 'includes/header.php'; ?>

<body>

    <div class="container my-3">
        <h1> Titel van de advertentie</h1>
        <div id="demo" class="carousel slide mx-auto" data-ride="carousel">

            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
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
            </div>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div class="form-group my-3">

            <h2>Omschrijving van de veiling</h2>
            <textarea class="form-control " rows="10" id="comment"></textarea>

            <div class="row">
            <div class=" my-3 w-50">
                <h2>Biedingen</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gebruiker</th>
                            <th>Bod</th>
                            <th>Tijd</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>700</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>Mary</td>
                            <td>600</td>
                            <td>mary@example.com</td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td>500</td>
                            <td>july@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" ml-3 my-3"> 
            <h2>Doe een bod!</h2>
            <textarea class="form-control " rows="1" id="bod"></textarea>
            <input type="submit" class="btn btn-info my-3" value="Bied!">
            </div>
        </div>
        </div>


    </div>

</body>
<?php include 'includes/footer.php'; ?>

</html>