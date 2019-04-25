<header>
    <div id="Top-Header" style="background-color: #ff814f">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md">

                <a class="navbar-brand" href="index.php">
                    <!-- <img src="images/test.jpg"  width="50px" alt=""> -->
                    <p class="lobster"> EenmaalAndermaal</p>
                </a>

                <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span
                        class="navbar-toggler-icon"></span></button>

                <div class="ml-auto">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="inloggen.php" class="btn btn-secondary ml-2" role="button">Inloggen</a>
                        </li>
                        <li class="nav-item">
                            <a href="registreren.php" class="btn btn-primary ml-2" role="button">Registreren</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div id="Lower-Header" style="background-color: #e8e8e8">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md">
                <div class="collapse navbar-collapse justify-content-center" id="navbarToggler">
                    <ul class="navbar-nav">
                        <li>
                            <form>
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control" id="zoek" placeholder="Zoek product">
                                </div>
                            </form>
                        </li>
                        <li>
                            <div class="form-group mr-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Selecteer categorie</option>
                                    <option>categorie 1</option>
                                    <option>categorie 2</option>
                                    <option>categorie 3</option>
                                    <option>categorie 4</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <form>
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control " id="postcode" placeholder="Postcode">
                                </div>
                            </form>
                        </li>
                        <li>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-primary mr-2">Zoeken</button>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                style="color: #1c1c1c" href="#">Bekijk categorieen</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">Categorie 1</a>
                                <a class="dropdown-item" href="">Categorie 2</a>
                                <a class="dropdown-item" href="">Categorie 3</a>
                                <a class="dropdown-item" href="">Categorie 4</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>