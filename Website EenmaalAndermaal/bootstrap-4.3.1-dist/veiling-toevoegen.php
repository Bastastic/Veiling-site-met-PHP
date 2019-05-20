<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/links.php'; ?>
    <title>Veiling toevoegen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    .admin-line {
        border-top: 5px solid #ff814f;
    }

    .hide {
        display: none;
    }

    .image-upload {
        height: 250px;
        width: 250px;
        border: 5px solid #ff814f;
    }

    .items {
        padding-top: 10px;
    }
    .form-group{
        width:150px;
    }
</style>


<body style="overflow-x:hidden">
    <?php include 'includes/header.php'; ?>
    <div class="jumbotron">
    </div> <!-- /container -->
    <section id="team">
        <div class="container">
            <h5 class="section-title h1">Categorie kiezen</h5>
            <div class="row-full">
                <hr class="admin-line">
                <div class="row">


                </div>
            </div>
            <!-- Images -->
            <h5 class="section-title h1">Foto's uploaden</h5>
            <hr class="admin-line">
            <p>0 van 4 foto's gebruikt</p>
            <div class="row-full">
                <form id="form1" runat="server">
                    <input type='button' id='remove' value='remove' class='hide' />
                    <input type='file' id="imgInp" /><br>
                    <img class="image-upload" id="blah" src="#" alt="your image" />
                </form>
                <form>
                    <input type='button' id='remove1' value='remove' class='hide' />
                    <input type='file' id="imgInp1" /><br>
                    <img class="image-upload" id="blah1" src="#" alt="your image" />
                </form>
            </div>
            <script>
                $('#blah, #blah1').hide();
                $('#remove, #remove1').hide();

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah, #blah1').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#imgInp, #imgInp1").change(function () {
                    if ($('#imgInp, #imgInp1').val() != "") {

                        $('#remove, #remove1').show();
                        $('#blah, #blah1').show('slow');
                    } else {
                        $('#remove, #remove1').hide();
                        $('#blah, #blah1').hide('slow');
                    }
                    readURL(this);
                });


                $('#remove, #remove1').click(function () {
                    $('#imgInp, #imgInp1').val('');
                    $(this).hide();
                    $('#blah, #blah1').hide('slow');
                    $('#blah, #blah1').attr('src',
                        'http://upload.wikimedia.org/wikipedia/commons/thumb/4/40/No_pub.svg/150px-No_pub.svg.png'
                    );
                });
            </script>

            <div class="row">
            </div>
            <!-- Titel en beschrijving -->
            <h5 class="section-title h1">Titel en beschrijving</h5>
            <div class="row-full">
                <hr class="admin-line">
                <p><b>Titel</b> (verplicht)</p>
                <div class=items>
                    <input type="text" name="titel">
                    <textarea id="froala-editor">Advertentietekst ingevullen.</textarea>
                    <script>
                        new FroalaEditor('textarea#froala-editor')
                    </script>
                    <div>


                    </div>
                    <!-- Kenmerken -->
                    <h5 class="section-title h1">Kenmerken</h5>
                    <div class="row-full">
                        <hr class="admin-line">

                        <div class="row">

                        </div>
                        <!-- Conditie -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Conditie</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Kies...</option>
                                <option>Nieuw</option>
                                <option>Zo goed als nieuw</option>
                                <option>Gebruikt</option>
                            </select>
                        </div>
                        <!-- Type -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Kies...</option>
                                <option>Nieuw</option>
                                <option>Zo goed als nieuw</option>
                                <option>Gebruikt</option>
                            </select>
                        </div>
                    </div>
                    <!-- Prijs -->
                    <h5 class="section-title h1">Prijs</h5>
                    <div class="row-full">
                        <hr class="admin-line">

                        <div class="row">

                        </div>
                    </div>
                    <!-- Contactgegevens en voorkeuren -->
                    <h5 class="section-title h1">Contactgegevens en voorkeuren</h5>
                    <div class="row-full">
                        <hr class="admin-line">
                        <button type="button" class="btn btn-success">Veiling plaatsen</button>

                        <div class="row">

                        </div>
                    </div>

                </div>
</body>

</html>