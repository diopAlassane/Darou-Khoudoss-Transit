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

if (isset($_POST) & !empty($_POST)) {
    // PHP Form Validations
    if (empty($_POST['email'])) {
        $errors[] = "Le champ Nom d'utilisateur / E-mail est obligatoire";
    }
    if (empty($_POST['password'])) {
        $errors[] = "Le champ Mot de passe est obligatoire";
    }
    // CSRF Token Validation
    if (isset($_POST['csrf_token'])) {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
        } else {
            $errors[] = "Problème avec la validation du CSRF";
        }
    }
    // CSRF Token Time Validation
    $max_time = 60 * 60 * 24; // in seconds
    if (isset($_SESSION['csrf_token_time'])) {
        $token_time = $_SESSION['csrf_token_time'];
        if (($token_time + $max_time) >= time()) {
        } else {
            $errors[] = "CSRF Token Expired";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }

    if (empty($errors)) {
        // Check the Login Credentials
        $sql = "SELECT * FROM users WHERE ";
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $sql .= "email=?";
        } else {
            $sql .= "username=?";
        }
        $result = $db->prepare($sql);
        $result->execute(array($_POST['email']));
        $count = $result->rowCount();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        if ($count == 1) {
            // Compare the password with password hash
            if (password_verify($_POST['password'], $res['password'])) {
                // regenerate session id
                session_regenerate_id();
                $_SESSION['login'] = true;
                $_SESSION['id'] = $res['id'];
                $_SESSION['last_login'] = time();

                // redirect the user to members area/dashboard page
                header("location: index.php");
            } else {
                $errors[] = "La combinaison nom d'utilisateur / e-mail et mot de passe ne fonctionne pas";
            }
        } else {
            $errors[] = "Nom d'utilisateur / E-mail non valide";
        }
    }
}
// 1. Create CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();


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
                <span class="sr-only">Chargement...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DAROU KHOUDOSS TRANSIT</h3>
                            </a>
                            <!-- <h3>Sign In</h3> -->
                        </div>
                        <?php
                            if(!empty($errors)){
                                echo "<div class='alert alert-danger'>";
                                foreach ($errors as $error) {
                                    echo "<span class='glyphicon glyphicon-remove'></span>&nbsp;".$error."<br>";
                                }
                                echo "</div>";
                            }
                        ?>
                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput"> Addresse Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                            
                                    <input type="checkbox" id="rememberme" name="rememberme" value="1">
                                    <label class="form-check-label" for="rememberme">Se souvenir de moi</label>
                                </div>
                                <a href="./reset.php">Mot de passe oublié ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">SE CONNECTER</button>
                            <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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