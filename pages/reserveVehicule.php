<?php
$host = "localhost";
$username = "root";
$password = "";
$bdname = "darou_khoudoss_transit";

try {
    $db = new PDO("mysql:host=$host;dbname=$bdname", "$username", "$password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Echec de la connexion :" . $e->getMessage());
}

if (isset($_POST['louerVoiture'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $model = $_POST['modele'];

    if (!empty($nom) && !empty($prenom) && !empty($phone)) {
        $req = "INSERT INTO location_vehicule SET prenom=?,nom=?,phone=?,adresse=? ,dateDebut=? ,dateFin=? ,modele=?";
        $resultat = $db->prepare($req);
        $resultat->execute([$prenom, $nom, $phone, $adresse, $dateDebut, $dateFin, $model]);

        if ($resultat) {
            echo '<script language="javascript">';
            echo 'alert("Votre de demande de location a été enregistrer. Nous vous contacterons dans les plus brefs délais"); location.href="reserveVehicule.php"';
            echo '</script>';
        } else {
            echo "echec";
        }
        // header("location: reserveVehicule.php");
    } else {
        echo "Erreur de remplir le Formulaire ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service</title>
    <meta name="description" content="FasTrans - Logistics & Delivery Company HTML template">
    <meta name="keywords" content="cargo, clean, contractor, corporate, freight, industry, localization, logistics, page builder, shipment, transport, transportation, truck, trucking">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="../assets/images/logoT.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/video.min.css">
    <link rel="stylesheet" href="../assets/css/animated-slider.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/rs6.css">
    <link rel="stylesheet" href="../assets/css/slick-theme.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!-- Start of header section
	============================================= -->
    <header id="ft-header" class="ft-header-section header-style-one">
        <div class="ft-header-content-wrapper position-relative">
            <div class="container">
                <div class="ft-header-content position-relative">
                    <div class="ft-brand-logo">
                        <a href="../index.php"><img src="../assets/images/logoT.png" alt="" style="width: 150px; height: 75px;"></a>
                    </div>
                    <div class="ft-header-menu-top-cta position-relative">
                        <div class="ft-header-top ul-li">
                            <ul>
                                <li><i class="fal fa-envelope"></i>contact@transit.com</li>
                                <li><i class="fal fa-map-marker-alt"></i>HLM Grand Yoff</li>
                            </ul>
                        </div>
                        <div class="ft-header-main-menu d-flex justify-content-end align-items-center">
                            <nav class="ft-main-navigation clearfix ul-li">
                                <ul id="ft-main-nav" class="nav navbar-nav clearfix">
                                    <li><a href="../index.php">Accueil</a></li>
                                    <li class="dropdown">
                                        <a href="#">Nos Services</a>
                                        <ul class="dropdown-menu clearfix">
                                            <li><a href="transportInternationnal.php">Transport Internationnal</a></li>
                                            <li><a href="./logistique.php">Logistique</a></li>
                                            <li><a href="./prestationSpeciale.php">Prestation spéciale</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Transport</a>
                                        <ul class="dropdown-menu clearfix">
                                            <li><a href="./locationVehicule.php">Location de voiture</a></li>
                                            <li><a href="./venteVehicule.php">Vente de voiture</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./cotationFret.php">Cotation de Fret</a></li>
                                    <li><a href="./contact.php">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="ft-header-cta-btn">
                                <a class="d-flex justify-content-center align-items-center" href="./contact.php">Devis
                                    gratuit</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile-Menu -->
                    <div class="mobile_menu position-relative">
                        <div class="mobile_menu_button open_mobile_menu">
                            <i class="fal fa-bars"></i>
                        </div>
                        <div class="mobile_menu_wrap">
                            <div class="mobile_menu_overlay open_mobile_menu"></div>
                            <div class="mobile_menu_content">
                                <div class="mobile_menu_close open_mobile_menu">
                                    <i class="fal fa-times"></i>
                                </div>
                                <div class="m-brand-logo">
                                    <a href="../index.php"><img src="../assets/newImgs/logo.png" alt="" style="width: 150px; height: 150px;"></a>
                                </div>
                                <nav class="mobile-main-navigation  clearfix ul-li">
                                    <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                        <li><a href="../index.php">Accueil</a></li>
                                        <li class="dropdown">
                                            <a href="#">Nos Services</a>
                                            <ul class="dropdown-menu clearfix">
                                                <li><a href="./transportInternationnal.php">Transport Internationnal </a></li>
                                                <li><a href="./logistique.php"> Logistique</a></li>
                                                <li><a href="./prestationSpeciale.php"> Prestation spéciale</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#">Transport</a>
                                            <ul class="dropdown-menu clearfix">
                                                <li><a href="./locationVehicule.php">Location de voiture</a></li>
                                                <li><a href="./venteVehicule.php">Vente de voiture</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="./cotationFret.php">Cotation de Fret</a></li>
                                        <li><a href="./contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End Mobile-Menu -->
                    </div>
                </div>
            </div>
            <div class="ft-header-cta-info d-flex">
                <div class="ft-header-cta-icon d-flex justify-content-center align-items-center">
                    <i class="fa fa-phone-volume text-black"></i>
                </div>
                <div class="ft-header-cta-text headline pera-content ">
                    <p>Entrer en contact</p>
                    <h3>+221 784808237</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- End of header section
	============================================= -->

    <!-- Start of Breadcrumb section
	============================================= -->
    <section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="../assets/img/bg/loca.png">
        <span class="background_overlay"></span>
        <span class="design-shape position-absolute"><img src="../assets/img/shape/tmd-sh.png" alt=""></span>
        <div class="container">
            <div class="ft-breadcrumb-content headline text-center position-relative">
                <h2>Services</h2>
                <div class="ft-breadcrumb-list ul-li">
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <li>Location de vehicule</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Breadcrumb section
	============================================= -->

    <!-- Start of Service page section
	============================================= -->

    <div class="container mb-50">
        <div class="mp-5 mb-5">
            <h1><span class="sub-title " style="font-size: 50px;">Location de voiture</span></h1>
            <p style="color: black;">Louer votre voiture préférer !</p>
        </div>
        <?php 
         if (isset($_GET['louerVoiture']) &&  $_GET['louerVoiture'] = 'true') {
            echo "<div class=\"alert alert-success\">
                <strong>Success!</strong> This alert box could indicate a successful or positive action.
            </div>";
         }
        ?>
        <form action="./reserveVehicule.php" method="POST">
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="prenom">Prénom <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="nom">Nom de famille <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="phone">Téléphone <span style="color: red;">*</span></label> <br>
                    <input id="phone" class="form-control" type="tel" name="phone" required />
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="adresse">Adresse<span style="color: red;"></span></label>
                    <input type="text" class="form-control" id="adresse" name="adresse">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="dateDebut">Date de début de location<span style="color: red;"></span></label>
                    <input type="datetime-local" class="form-control" id="dateDebut" name="dateDebut">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="dateFin">Date de fin de location<span style="color: red;"></span></label>
                    <input type="datetime-local" class="form-control" id="dateFin" name="dateFin">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label text-dark" for="modele">Modéle de voiture<span style="color: red;"></span></label>
                    <select name="modele" id="modele" class="form-control text-center text-black">
                        <option value="0" selected disabled>-- Choisissez un modéle --</option>
                        <option value="HYUNDAI-GRANDEUR">HYUNDAI - GRANDEUR</option>
                        <option value="FORD-Fusion">FORD - Fusion</option>
                        <option value="FORD-ESCAPE">FORD - ESCAPE</option>
                        <option value="FORD-EXPLORER">FORD - EXPLORER</option>
                        <option value="JEEP - GRAND CHEROKEE">JEEP - GRAND CHEROKEE</option>
                        <option value="MITSUBISHI - L200">MITSUBISHI - L200</option>
                        <option value="MITSUBISHI - OUTLANDER">MITSUBISHI - OUTLANDER</option>
                        <option value="HYUNDAI - SANTA FE">HYUNDAI - SANTA FE</option>
                        <option value="HYUNDAI - SANTA FE">HYUNDAI - SANTA FE</option>
                    </select>
                </div>
                <button type="submit" name="louerVoiture" class="btn btn-success mb-20 col-sm-3" style="margin-bottom :50px;">Soumettre</button>
            </div>
        </form>
    </div>

    <!-- End of Service page section
	============================================= -->




    <!-- Start of Footer   section
	============================================= -->
    <footer id="ft-footer-2" class="ft-footer-section-2 mt-50" data-background="assets/img/bg/f-bg.png">

        <div class="ft-footer-widget-wrapper-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="logo-widget">

                                <h3 class="widget-title">Contactez-nous</h3>

                                <div class="ft-footer-address">
                                    <span>Addresse: 27 HLM Grand Yoff</span>
                                    <span>site web: sentechvalley.com</span>
                                    <span>E-mail: contact@mail.com</span>
                                    <span>Téléphone: +221 784808237</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="menu-widget">
                                <h3 class="widget-title">Nos Services</h3>
                                <ul>
                                    <li><a href="transportInternationnal.php">Transport Internationnal</a></li>
                                    <li><a href="logistique.php">Logistique</a></li>
                                    <li><a href="prestationSpeciale.php">Prestation spéciale</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="ft-footer-copywrite-2 text-center">
            <span>Copyright @ 2022 SENTECH VALLEY All Rights Reserved</span>
        </div>
    </footer>
    <!-- End of FAQ why choose  section
	============================================= -->


    <!-- For Js Library -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/appear.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/rbtools.min.js"></script>
    <script src="../assets/js/jquery.cssslider.min.js"></script>
    <script src="../assets/js/rs6.min.js"></script>
    <script src="../assets/js/knob.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/gmaps.min.js"></script>
    <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>


</body>
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

</html>