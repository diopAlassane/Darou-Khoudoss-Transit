<?php
session_start();
  
if(!$_SESSION['id']){
    header('location:login.php');
}

require_once('config.php');
// if ($_GET['idsup']) {
//     $id = $_GET['idsup'];
//     $req = "DELETE FROM users WHERE username=?";
//     $resultat = $db->prepare($req);
//     $resultat->execute([$id]);
//     header('Location: allUsers.php');
// }

$req = $pdo->prepare("SELECT * FROM acaht_voiture ORDER BY id DESC ");
$req->execute();
$vehicule = $req->fetchAll();

// require_once('check-login.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DAROU KHOUDOSS TRANSIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Téléchargement...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>D.K. TRANSIT</h3>
                </a>



                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>Utilisateurs</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signup.php" class="dropdown-item">Nouveau</a>
                            <a href="allUsers.php" class="dropdown-item">Consulter</a>
                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-car-side me-2"></i>Véhicules</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="location_vehicule.php" class="dropdown-item">Location</a>
                            <a href="./vente_vehicule.php" class="dropdown-item">Vente</a>
                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    </div>
                    <a href="./cota.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Cotation Fret</a>
                    <a href="./contact_admin.php" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Contact</a>
                    <a href="./logout.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Se déconnecter</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>


            </nav>
            <!-- Navbar End -->

            <div class="container">
                <div class="mt-90 mb-90 text-center">
                    <h1>Consulter la liste des voitures vendues</h1>
                </div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Date de vente</th>
                            <th scope="col">Modele de voiture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicule as $value) : ?>
                            <tr>
                                <th scope="row"><?php echo $value["id"]; ?></th>
                                <td><?php echo $value["prenom"]; ?></td>
                                <td><?php echo $value["nom"]; ?></td>
                                <td><?php echo $value["phone"]; ?></td>
                                <td><?php echo $value["adresse"]; ?></td>>
                                <td><?php echo $value["dateAchat"]; ?></td>
                                <td><?php echo $value["model"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>