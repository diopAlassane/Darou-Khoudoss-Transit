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

if (isset($_POST['contationFretValidate'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $entreprise = $_POST['entreprise'];
    $commentaire = $_POST['commentaire'];
    $checkBox[] = $_POST['prestation'];
       
        if (!empty($nom) && !empty($prenom) && !empty($phone) && !empty($email)) {
            $req = "INSERT INTO cotationfret SET prenom=?,nom=?,phone=?,email=? ,entreprise=? ,commentaire=? ,prestation=?";
            $resultat = $db->prepare($req);
            $resultat->execute([$prenom, $nom, $phone, $email, $entreprise, $commentaire, $checkBox]);
    
            if ($resultat) {
                echo '<script language="javascript">';
                echo 'alert("Votre de demande de cotation a été enregistrer. Nous vous contacterons dans les plus brefs délais"); location.href="cotationFret.php"';
                echo '</script>';
            } else {
                echo "echec";
            }

        } else {
            echo "Erreur de remplir le Formulaire ";
        }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="description" content="FasTrans - Logistics & Delivery Company HTML template">
    <meta name="keywords" content="cargo, clean, contractor, corporate, freight, industry, localization, logistics, page builder, shipment, transport, transportation, truck, trucking">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="../assets/images/logoT.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

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
    <section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="../assets/img/bg/wc-bg.jpg">
        <span class="background_overlay"></span>
        <span class="design-shape position-absolute"><img src="../assets/img/shape/tmd-sh.png" alt=""></span>
        <div class="container">
            <div class="ft-breadcrumb-content headline text-center position-relative">
                <h2>Cotation de fret</h2>
                <div class="ft-breadcrumb-list ul-li">
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <li>cotation de fret</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Breadcrumb section
	============================================= -->

    <!-- Form cotation
	============================================= -->
    <div class="container mb-50">
        <div class="mp-5 mb-5">
            <h1><span class="sub-title " style="font-size: 50px;">Demander une cotation</span></h1>
            <p style="color: black;">Pour vos besoins de fret, transit et autres prestations logistiques, merci de compléter le formulaire ci-dessous, ou envoyez-nous un e-mail à contact@support.com</p>
        </div>
        <form action="./cotationFret.php" method="POST">
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="prenom">Prénom <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="nom">Nom de famille <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="phone">Téléphone <span style="color: red;">*</span></label> <br>
                    <input id="phone" class="form-control" type="tel" name="phone" />
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark" for="email">Adresse email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label text-dark" for="entreprise">Votre structure / Entreprise </label>
                    <input type="text" class="form-control" id="entreprise" name="entreprise">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label text-dark">Prestations souhaitées <span style="color: red;">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value="Achat Internationnal" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Achat Internationnal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value="Transport international" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Transport international
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value="Formalité douane" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Formalité douane
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value=" Dernier KM" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Dernier KM
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value="Stockage" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Stockage
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prestation[]" value="  Degroupage" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Degroupage
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="commentaire" class="form-label text-dark">Commentaire / Questions</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="4"></textarea>
                </div>
                <button type="submit" name="contationFretValidate" class="btn btn-success mb-20 col-sm-3" style="margin-bottom :50px;">Soumettre</button>
            </div>
        </form>
    </div>

    <!-- Start of Footer   section
	============================================= -->
    <footer id="ft-footer-2" class="ft-footer-section-2 mt-20" data-background="assets/img/bg/f-bg.png">
        <div class="ft-footer-newslatter position-relative">
            <div class="container">
                <div class="ft-footer-newslatter-content d-flex justify-content-between align-items-center flex-wrap">
                    <div class="ft-footer-newslatter-text headline">
                        <h2>Inscrivez-vous pour recevoir des nouvelles.</h2>
                    </div>
                    <div class="ft-footer-newslatter-form position-relative">
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit">Abonnez-vous maintant</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</body>

<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

</html>