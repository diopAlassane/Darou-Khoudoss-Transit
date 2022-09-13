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
    if (empty($_POST['username'])) {
        $errors[] = "Le champ Nom d'utilisateur est obligatoire";
    } else {
        // Check Username is Unique with DB query
        $sql = "SELECT * FROM users WHERE username=?";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['username']));
        $count = $result->rowCount();
        if ($count == 1) {
            $errors[] = "Le nom d'utilisateur existe déjà dans la base de données";
        }
    }
    if (empty($_POST['email'])) {
        $errors[] = "Le champ E-mail est obligatoire";
    } else {
        // Check Email is Unique with DB Query
        $sql = "SELECT * FROM users WHERE email=?";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['email']));
        $count = $result->rowCount();
        if ($count == 1) {
            $errors[] = "L'e-mail existe déjà dans la base de données";
        }
    }
    if (empty($_POST['mobile'])) {
        $errors[] = "Le champ Mobile est obligatoire";
    }
    if (empty($_POST['password'])) {
        $errors[] = "Le champ Mot de passe est obligatoire";
    } else {
        // check the repeat password
        if (empty($_POST['passwordr'])) {
            $errors[] = "Le champ Répéter le mot de passe est obligatoire";
        } else {
            // compare both passwords, if they match. Generate the Password Hash
            if ($_POST['password'] == $_POST['passwordr']) {
                // create password hash
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                // Display Error Message
                $errors[] = "Les deux mots de passe doivent correspondre";
            }
        }
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
            $errors[] = "CSRF expiré";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }

    // If no Errors, Insert the Values into users table
    if (empty($errors)) {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $result = $db->prepare($sql);
        $values = array(
            ':username'     => $_POST['username'],
            ':email'        => $_POST['email'],
            ':password'     => $pass_hash
        );
        $res = $result->execute($values);
        if ($res) {
            $messages[] = "Utilisateur enregistré";
            // get the id from last insert query and insert a new record into user_info table with mobile number
            $userid = $db->lastInsertID();
            $uisql = "INSERT INTO user_info (uid, mobile) VALUES (:uid, :mobile)";
            $uiresult = $db->prepare($uisql);
            $values = array(
                ':uid'          => $userid,
                ':mobile'       => $_POST['mobile']
            );
            $uires = $uiresult->execute($values) or die(print_r($result->errorInfo(), true));
            if ($uires) {
                $messages[] = "informations utilisateur ajoutées";
            }
        }
    }
}
// CSRF Protection
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
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Darou Khoudoss Transit</h3>
                            </a>
                            <!-- <h3>S'inscrire</h3> -->
                        </div>
                        <?php
                        if (!empty($errors)) {
                            echo "<div class='alert alert-danger'>";
                            foreach ($errors as $error) {
                                echo "<span class='glyphicon glyphicon-remove'></span>&nbsp;" . $error . "<br>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <?php
                        if (!empty($messages)) {
                            echo "<div class='alert alert-success'>";
                            foreach ($messages as $message) {
                                echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;" . $message . "<br>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <form action="signup.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="username" placeholder="jhondoe value=" <?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>>
                                <label for="floatingText">Nom d'utilisateur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" <?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>>
                                <label for="floatingInput">Adresse Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingInput" name="mobile" placeholder="+221784589933" <?php if(isset($_POST['mobile'])){ echo $_POST['mobile']; } ?>>
                                <label for="floatingInput">Numéro téléphone</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="passwordr" placeholder="Password">
                                <label for="floatingPassword">Répéter le mot de passe</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                                <!-- <a href="">Mot de passe oublié ?</a> -->
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">NOUVEL UTILISATEUR</button>
                            <p class="text-center mb-0"> <a href="./index.php"> <i class="fa fa-backward me-2"></i> Retourner à la page d'accueil</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
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