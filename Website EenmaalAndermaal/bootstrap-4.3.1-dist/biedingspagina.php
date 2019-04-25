<?php  include ('header.php'); ?>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="span12" id="slider">
                <!-- Top part of the slider -->
                <div class="row">
                    <div class="span8" id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item" data-slide-number="0"> <img src="http://placehold.it/770x300&text=one"></div>
                                <div class="item" data-slide-number="1"> <img src="http://placehold.it/770x300&text=two"></div>
                                <div class="item" data-slide-number="2"> <img src="http://placehold.it/770x300&text=three"></div>
                                <div class="item" data-slide-number="3"> <img src="http://placehold.it/770x300&text=four"></div>
                                <div class="item" data-slide-number="4"> <img src="http://placehold.it/770x300&text=five"></div>
                                <div class="item" data-slide-number="5"> <img src="http://placehold.it/770x300&text=six"></div>
                            </div>
                            <!-- Carousel nav --><a class="carousel-control left" data-slide="prev" href="#myCarousel">‹</a> <a class="carousel-control right" data-slide="next" href="#myCarousel">›</a> </div>
                    </div>
                    <div class="span4" id="carousel-text"></div>
                    <div id="slide-content" style="display: none;">
                        <div id="slide-content-0">
                            <h2>Slider One</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                        <div id="slide-content-1">
                            <h2>Slider Two</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                        <div id="slide-content-2">
                            <h2>Slider Three</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                        <div id="slide-content-3">
                            <h2>Slider Four</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                        <div id="slide-content-4">
                            <h2>Slider Five</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                        <div id="slide-content-5">
                            <h2>Slider Six</h2>
                            <p>Lorem Ipsum Dolor</p>
                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Slider-->
        
    </div>
</div>




<script>

jQuery(document).ready(function($) { $('#myCarousel').carousel({ interval: 5000 }); 
$('#carousel-text').html($('#slide-content-0').html());

</script>
