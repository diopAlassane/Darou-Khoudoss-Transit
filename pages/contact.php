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

if (isset($_POST['contactez'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $affiliation = $_POST['affiliation'];
    $departement = $_POST['departement'];
    $date = $_POST['date'];
    $message = $_POST['message'];
       
        if (!empty($nom) && !empty($email) && !empty($telephone)) {
            $req = "INSERT INTO contact SET nom=?,email=?,phone=?,affiliation=? ,departement=? ,dateContact=? ,messages=?";
            $resultat = $db->prepare($req);
            $resultat->execute([$nom, $email, $telephone, $affiliation, $departement, $date, $message]);
    
            if ($resultat) {
                echo '<script language="javascript">';
                echo 'alert("Formulaire enregistrer. Nous vous contacterons en retour dans les plus brefs délais"); location.href="contact.php"';
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
                        <a href="../index.php"><img src="../assets/images/logoT.png" alt=""style="width: 150px; height: 75px;"></a>
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
	<section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="../assets/img/bg/ser-bg.png">
		<span class="background_overlay"></span>
		<span class="design-shape position-absolute"><img src="../assets/img/shape/tmd-sh.png" alt=""></span>
		<div class="container">
			<div class="ft-breadcrumb-content headline text-center position-relative">
				<h2>Contact</h2>
				<div class="ft-breadcrumb-list ul-li">
					<ul>
						<li><a href="../index.php">Accueil</a></li>
						<li>Contact</li>
					</ul>
				</div>
			</div>
		</div>
	</section>	
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of contact page section
	============================================= -->
	<section id="ft-contact-page" class="ft-contact-page-section page-padding">
		<div class="container">
			<div class="ft-contact-page-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="ft-contact-page-text-wrapper">
							<div class="ft-section-title-2 headline pera-content">
								<span class="sub-title">Obtenir un devis</span>
								<h2>Contactez-nous et nous aiderons votre entreprise
								</h2>
							</div>
							<div class="ft-contact-page-contact-info">
								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="fal fa-map-marker-alt"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Adresse de bureau</h3>
										<p>HLM Grand Yoff
										Dakar Plateaux</p>
									</div>
								</div>
								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="fas fa-phone-alt"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Numéro de téléphone</h3>
										<p>(+221) 784808237</p>
										<p>(+221) 774997759</p>
									</div>
								</div>
								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="far fa-envelope"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Adresse mail</h3>
										<p>welziiranzoh@gmail.com</p>
										<p>contact@support.com</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ft-contact-page-form-wrapper headline">
							<h3 class="text-center">Obtenir un devis</h3>
							<form action="contact.php" method="POST">
								<div class="row">
									<div class="col-lg-6">
										<input type="text" name="nom" id="nom" placeholder="Votre nom" required>
									</div>
									<div class="col-lg-6">
										<input type="email" name="email" id="email" placeholder="Votre email" required>
									</div>
									<div class="col-lg-6">
										<input type="text" name="affiliation" id="affiliation" placeholder="Affiliation">
									</div>
									<div class="col-lg-6">
										<input type="text" name="telephone" id="telephone" placeholder="Téléphone" required>
									</div>
									<div class="col-lg-6">
										<input type="text" name="departement" id="departement" placeholder="Département d'enquête">
									</div>
									<div class="col-lg-6">
										<input type="date" name="date" id="date" placeholder="Date">
									</div>
									<div class="col-lg-12">
										<textarea name="message" id="message" placeholder="Votre message..." required></textarea>
									</div>
									<div class="col-lg-12">
										<button type="submit" name="contactez"> Prendre un rendez-vous</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>		
<!-- End of contact page section
	============================================= -->	

<!-- Start of Footer   section
	============================================= -->
    <footer id="ft-footer-2" class="ft-footer-section-2" data-background="../assets/img/bg/f-bg.png">
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
</body>

<script>
    const phoneInputField = document.querySelector("#telephone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
</html>			