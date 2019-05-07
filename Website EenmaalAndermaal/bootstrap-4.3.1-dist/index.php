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
    #demo {
        height: 50%;
        width: 50%;
        float: left;
    }

    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .row {
        padding-left:2.5%;
        padding-top:1%;
    }
    .row h2{
        font-family: Lobster;
    }
    #ad{
        padding-top:1%;
        padding-right:1%;
    }
    #ad img {
        width:100%;
        height:100%;
    }
    #ad{
        color:white;
        background-color:#ff814f;
        font-family: Lobster;
        padding-left:1%;
    }
</style>

<?php include 'includes/header.php'; ?>

<?php include 'php/connectDB.php'; ?>

<body>

<div class="container">
<div class="row align-items-start">
    <div class="col">
    <div class="advertisment-text-header">
        <p>Hoofdadvertentie</p>
    </div>  
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
                    <img src="images/placeholder.png" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder.png" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder.png" alt="New York">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder.png" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder.png" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder.png" alt="Chicago">
                </div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
            <div class="col">
                One of four columns
            </div>
        </div>
    </div>
  </div>
  <div class="row align-items-start">
  <!-- first column from 1st row -->
    <div class="col">
      <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- second column from 1st row -->
    <div class="col">
        <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- third column from 1st row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- fourth column from 1st row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
  </div>
  <div class="row align-items-center">
  <!-- first column 2st row -->
  <div class="col">
      <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- second column 2st row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- third column 2st row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- fourth row 2st row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
  </div>
  <div class="row align-items-end">
  <!-- first row 3th row -->
  <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- second column 3th row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- third column 3th row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
    <!-- fourth column 3th row -->
    <div class="col">
    <div id="ad">
        <img src="images/placeholder.png" alt="Responsive image">
        <p>Advertentie titel</p>
    </div>
    </div>
  </div>
</div>


</body>

<?php include 'includes/footer.php'; ?>

</html>