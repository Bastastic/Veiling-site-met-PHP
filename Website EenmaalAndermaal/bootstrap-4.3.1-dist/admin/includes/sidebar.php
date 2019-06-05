<!-- <style>
    .dash-nav-dropdown {
        width: 300px;
    }

    .dash-nav-dropdown,
    .show {
        width: 300px;
    }

    .dash-toolbar {
        margin-left: 61px;

    }
</style> -->

<?php session_start();
require_once '../php/connectDB.php';
if(!isset($_SESSION['adminID'])){
    header('Location: ../inloggen.php');
}else{
    $adminID = $_SESSION['adminID'];
    $query = 'SELECT * FROM Admin WHERE Gebruikersnaam = :gebruikersnaam';
    $sql = $dbh->prepare($query);
    $sql->execute(['gebruikersnaam' => $adminID]);
    $admin = $sql->fetch(PDO::FETCH_ASSOC);
    $voornaam = $admin['Voornaam'];
    $achternaam = $admin['Achternaam'];
}
?>
<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="index.php" class="spur-logo"><span>EA Admin</span></a>
        </header>
        <nav class="dash-nav-list">
            <a href="index.php" class="dash-nav-item">
                <i class="fas fa-home"></i> Dashboard </a>
            <div class="dash-nav-dropdown">
                <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                    <i class="fas fa-chart-bar"></i> Verkoper </a>
                <div class="dash-nav-dropdown-menu">
                    <a href="verkoper-blokkeren.php" class="dash-nav-dropdown-item">Verkoper blokkeren</a>
                    <a href="verkoper-deblokkeren.php" class="dash-nav-dropdown-item">Verkoper deblokkeren</a>
                </div>
            </div>
            <div class="dash-nav-dropdown ">
                <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                    <i class="fas fa-cube"></i> Gebruiker </a>
                <div class="dash-nav-dropdown-menu">
                    <a href="gebruiker-blokkeren.php" class="dash-nav-dropdown-item">Gebruiker blokkeren</a>
                    <a href="gebruiker-deblokkeren.php" class="dash-nav-dropdown-item">Gebruiker deblokkeren</a>
                </div>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-file"></i> Veilingen </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="veiling-blokkeren.php" class="dash-nav-dropdown-item">Veiling blokkeren</a>
                        <a href="veiling-deblokkeren.php" class="dash-nav-dropdown-item">Veiling deblokkeren</a>
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
                <a href="#!" class="tools-item">
                    <i class="fas fa-bell"></i>
                    <i class="tools-item-count">4</i>
                </a>
                <div class="dropdown tools-item">
                    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <span class="dropdown-item"><?=$voornaam?> <?=$achternaam?></span>
                        <a class="dropdown-item" href="../php/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </header>