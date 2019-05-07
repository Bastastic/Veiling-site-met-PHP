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

    p {
        font-size: 20px;
        margin-top: 0px;
    }

    .biedbutton{
        background-color: #ff814f;
        color : #ffffff;
    }

    .biedbutton:hover {
        color : black;
    }
</style>

<?php include 'includes/header.php'; ?>

<body>

    <div class="container my-3">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
        <div id="demo" class="carousel slide mx-auto" data-ride="carousel">
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
        <div class="form-group my-3">
        <h2> Titel van de advertentie</h2>
            <small>
                Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis
                ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
                Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis
                gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut,
                mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit
                fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac
                dui quis mi consectetuer lacinia.
            </small>

        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="col">
                    <p><h4>Henk Knol</h4>
                    <h6>Bijna 69 jaar actief op EenmaalAndermaal</h6>
                    Rating 4,5 van de 5</p>
                    <hr><h6>Omgeving Apeldoorn</h6>
                    <div class="row  float-right">
                                <a href="" class="btn btn-secondary" role="button">Chatten</a>
                                &nbsp; &nbsp;
                                <a href="" class="btn btn-primary" role="button">Meer van Henk</a>
    
                        </div>
                        <br>
                        <br>
                    <p><h4>Biedingen</h4>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control my-4" placeholder="" aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-prepend my-4">
                            <input  type="submit" class="btn biedbutton" value="Bied">
                        </div>          
                    </div>
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
                                <td>€700,49</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>€600,13</td>
                                <td>mary@example.com</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>€530,61</td>
                                <td>july@example.com</td>
                            </tr>
                        </tbody>
                    </table>     
                    
                </div>
            </div>
        </div>
</p>
        </div>
    </div>

</body>
<footer>
<?php include 'includes/footer.php'; ?>
</footer>
</html>