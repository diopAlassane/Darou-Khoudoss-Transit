<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
// require_once('includes/connect.php');
require_once('smtp.php');
// require_once('if-loggedin.php');
// include('includes/header.php');
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

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$url = "http://localhost/Simple-Login-Portal/";
if(isset($_POST) & !empty($_POST)){
    // PHP Form Validations
    if(empty($_POST['email'])){ $errors[]=" Le champ Nom d'utilisateur / E-mail est obligatoire"; }
    // CSRF Token Validation
    if(isset($_POST['csrf_token'])){
        if($_POST['csrf_token'] === $_SESSION['csrf_token']){
        }else{
            $errors[] = "Un problème avec le CSRF Token Validation";
        }
    }
    // CSRF Token Time Validation
    $max_time = 60*60*24; // in seconds
    if(isset($_SESSION['csrf_token_time'])){
        $token_time = $_SESSION['csrf_token_time'];
        if(($token_time + $max_time) >= time() ){
        }else{
            $errors[] = "CSRF Token Expired";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }
    if(empty($errors)){
        // check the username / email exists is database, if exists create reset token and send email
        $sql = "SELECT * FROM users WHERE ";
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $sql .= "email=?";
        }else{
            $sql .= "username=?";
        }
        $result = $db->prepare($sql);
        $result->execute(array($_POST['email']));
        $count = $result->rowCount();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        $userid = $res['id'];
        if($count == 1){
            $messages[] = "Le nom d'utilisateur / e-mail existe, créez un Token de réinitialisation et envoyez un e-mail";
            // Generating and Inserting Reset Token in DB Table
            $reset_token = md5($res['username'].time());
            $resetsql = "INSERT INTO password_reset (uid, reset_token) VALUES (:uid, :reset_token)";
            $resetresult = $db->prepare($resetsql);
            $values = array(':uid'          => $userid,
                            ':reset_token'  => $reset_token
                            );
            $resetres = $resetresult->execute($values);
            if($resetres){
                $messages[] = "Send email with Reset Token";
                $mail = new PHPMailer(true);

                try {

                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = $smtphost;  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $smtpuser;                     // SMTP username
                    $mail->Password   = $smtppass;                               // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('test@example.com', 'Vivek Vengala');
                    $mail->addAddress($res['email'], $res['username']);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'réinitialiser le mot de passe';
                    $mail->Body    = "{$url}reset-password.php?key={$reset_token}&id={$userid}";
                    $mail->AltBody = 'Il s agit du corps en texte brut pour les clients de messagerie non HTML';

                    $mail->send();
                    $messages[] = 'E-mail de réinitialisation du mot de passe envoyé, suivez les instructions';
                } catch (Exception $e) {
                    echo "Le message n'a pas pu être envoyé. Erreur Mailer : Erreur SMTP: {$mail->ErrorInfo}";
                }
            }
        }else{
            $errors[] = "Votre compte n'est pas disponible dans notre base de données, veuillez vérifier auprès de l'administrateur du site !";
        }
    }
}
// 1. Create CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Reset Password</h3>
                </div>
                <div class="panel-body">
                    <?php
                            if(!empty($errors)){
                                echo "<div class='alert alert-danger'>";
                                foreach ($errors as $error) {
                                    echo "<span class='glyphicon glyphicon-remove'></span>&nbsp;".$error."<br>";
                                }
                                echo "</div>";
                            }
                        ?>
                        <?php
                            if(!empty($messages)){
                                echo "<div class='alert alert-success'>";
                                foreach ($messages as $message) {
                                    echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;".$message."<br>";
                                }
                                echo "</div>";
                            }
                        ?>
                    <form role="form" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail or User Name" name="email" type="text" autofocus value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="réinitialiser le mot de passe" /> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

