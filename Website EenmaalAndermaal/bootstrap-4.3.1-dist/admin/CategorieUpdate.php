<!doctype html>
<html lang="en">

<head>
    <?php include 'includes/links.php' ?>
    <title>Rubrieken</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.php" class="spur-logo"><i class="fas fa-bolt"></i> <span>Spur</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="index.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-chart-bar"></i> Charts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="chartjs.php" class="dash-nav-dropdown-item">Chart.js</a>
                    </div>
                </div>
                <div class="dash-nav-dropdown ">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-cube"></i> Components </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="cards.php" class="dash-nav-dropdown-item">Cards</a>
                        <a href="forms.php" class="dash-nav-dropdown-item">Forms</a>
                        <div class="dash-nav-dropdown ">
                            <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
                            <div class="dash-nav-dropdown-menu">
                                <a href="icons.php" class="dash-nav-dropdown-item">Solid Icons</a>
                                <a href="icons.php#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
                                <a href="icons.php#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
                            </div>
                        </div>
                        <a href="stats.php" class="dash-nav-dropdown-item">Stats</a>
                        <a href="tables.php" class="dash-nav-dropdown-item">Tables</a>
                        <a href="typography.php" class="dash-nav-dropdown-item">Typography</a>
                        <a href="userinterface.php" class="dash-nav-dropdown-item">User Interface</a>
                    </div>
                </div>
                <div class="dash-nav-dropdown show">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-file"></i> Layouts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="blank.php" class="dash-nav-dropdown-item">Blank</a>
                        <a href="content.php" class="dash-nav-dropdown-item">Content</a>
                        <a href="login.php" class="dash-nav-dropdown-item">Log in</a>
                        <a href="signup.php" class="dash-nav-dropdown-item">Sign up</a>
                    </div>
                </div>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-info"></i> About </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="dash-nav-dropdown-item">GitHub</a>
                        <a href="http://hackerthemes.com" target="_blank" class="dash-nav-dropdown-item">HackerThemes</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="type to search">
                </form>
                <div class="tools">
                    <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="tools-item">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#!" class="tools-item">
                        <i class="fas fa-bell"></i>
                        <i class="tools-item-count">4</i>
                    </a>
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <a class="dropdown-item" href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Rubrieken</h1>
                    <!-- put your rows / columns here -->
                    

                    <div class="row">
                        <input class="col-8">
                        <button class="col-2 btn btn-primary"></button>
                        <button class="col-2 btn btn-primary"></button>
                    </div>


                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>

</html>