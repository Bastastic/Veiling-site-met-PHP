<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <link rel="stylesheet" href="css/faq.css" />

    <title>F.A.Q.</title>
</head>

<?php include 'includes/header.php'; ?>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                    <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1"
                        aria-selected="true">
                        <i class="mdi mdi-help-circle"></i> Veel gestelde vragen
                    </a>
                    <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3"
                        aria-selected="false">
                        <i class="mdi mdi-account-settings"></i> Account
                    </a>
                    <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4"
                        aria-selected="false">
                        <i class="mdi mdi-heart"></i> Verkoper
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="faq-tab-content">
                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="accordion" id="accordion-tab-1">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-1">Ik wil bieden maar ik kan niet op bieden drukken, hoe kan dat?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-1-content-1"
                                    aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p> Om te kunnen bieden moet U ingelogd zijn. Mocht u nog geen account hebben om mee in te kunnen 
                                        loggen dan zal U een account moeten maken. Dit kan door rechtsboven op registreren te drukken.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-2">Ik heb geregistreerd maar ik kan niks doen? Ik zie wel dat ik ingelogd ben.</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-2"
                                    aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Na het registreren zult U nog een verificatieproces moeten doorlopen om als account op actief te worden gezet.
                                        U zult opnieuw uw emailadres op moeten geven waarna u een mail krijgt met een verificatiecode. Hiermee kunt U uw account
                                        activeren.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-3">Hoe kan ik een vieling starten.</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-3"
                                    aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Als u bent ingelogd kunt een veiling plaatsen mits u een verkoper bent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                        <div class="accordion" id="accordion-tab-3">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-1">Kan ik zonder een account meebieden?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-3-content-1"
                                    aria-labelledby="accordion-tab-3-heading-1" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>Nee, zonder account is het niet mogelijk om mee te bieden op een voorwerp. Het is wel mogelijk om alles te 
                                        van de vieling te zien maar niet om mee toe doen bij het bieden. Hiervoor moet er echt een account voor gemaakt zijn.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-3">Ik ben mijn wachtwoord vergeten, wat moet ik doen ?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-3-content-3"
                                    aria-labelledby="accordion-tab-3-heading-3" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>Als U uw wachtwoord vergeten bent kunt U drukken op het vergeten wachtwoord knop. Hierna kunt u de stappen volgen voor het 
                                        wijzigen van uw wachtwoord.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-4">Waar kan ik mijn gegevens inzien?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-3-content-4"
                                    aria-labelledby="accordion-tab-3-heading-4" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>Rechtsbovenin naast het uitloggen knop (deze is te zien als u ingelogd bent) staat uw gebruikersnaam,
                                         als hierop wordt gedrukt gaat men naar de profielpagina. Hier zijn alle ingevulgde gegevens van de registratie te zien.  </p>
                                        <p><strong>Example: </strong>Tell them I hate them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                        <div class="accordion" id="accordion-tab-4">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-1">Hoe kan ik een verkoper worden?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-4-content-1"
                                    aria-labelledby="accordion-tab-4-heading-1" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>Dit kan door het aan te vinken bij het registreren of bij de profielpagina.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-2">Is er een max voor het bieden van veilingen?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-4-content-2"
                                    aria-labelledby="accordion-tab-4-heading-2" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>Nee zeker niet! U kunt zoveel veilingen plaatsten als gewenst!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-3">Kan ik als ik verkoper ben ook bieden?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-4-content-3"
                                    aria-labelledby="accordion-tab-4-heading-3" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>Ja zeker, dit is mogelijk. Het enige verschil tussen een geregistreerde gebruiker die geen verkoper is en een verkoper 
                                        is dat de verkoper ook veilingen kan plaatsen. Een geregistreerde gebruiker kan dit niet. </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>
<?php include 'includes/footer.php'; ?>

</html>