<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
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

// include('includes/header.php');
require_once('smtp.php');

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
//1 . Obtenez les détails de l'utilisateur en fonction de la clé de réinitialisation et de l'identifiant, affichez-les dans le formulaire
//2. Après la soumission du formulaire, vérifiez la clé de réinitialisation et l'identifiant. s'il existe, mettez à jour le mot de passe et supprimez le jeton de réinitialisation de la table password_reset, envoyez un e-mail de confirmation
if(isset($_POST) & !empty($_POST)){
	if(empty($_POST['password'])){ $errors[]="Le champ Mot de passe est obligatoire"; }else{
        // vérifier le mot de passe de répétition
        if(empty($_POST['passwordr'])){ $errors[]="Le champ Répéter le mot de passe est obligatoire"; }else{
	        // comparer les deux mots de passe, s'ils correspondent. Générer le hachage du mot de passe
	        if($_POST['password'] == $_POST['passwordr']){
	            // créer un hachage (chiffrement) de mot de passe
	            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	        }else{
	            //Afficher le message d'erreur
	            $errors[] = "Les deux mots de passe doivent correspondre";
	        }
	    }
    }

    //Validation du CSRF Token 
    if(isset($_POST['csrf_token'])){
        if($_POST['csrf_token'] === $_SESSION['csrf_token']){
        }else{
            $errors[] = "Probleme avec le CSRF Token Validation";
        }
    }
    //Validation du temps CSRF Token
    $max_time = 60*60*24; // en seconde
    if(isset($_SESSION['csrf_token_time'])){
        $token_time = $_SESSION['csrf_token_time'];
        if(($token_time + $max_time) >= time() ){
        }else{
            $errors[] = "CSRF Token Expiré";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }

    if(empty($errors)){
    	// mettez à jour le mot de passe après avoir soumis un nouveau mot de passe, avant cela, vérifiez le jeton de réinitialisation avec l'identifiant de l'utilisateur
    	$sql = "SELECT * FROM password_reset WHERE reset_token=:reset_token AND uid=:uid";
		$result = $db->prepare($sql);
		$values = array(':reset_token'		=> $_POST['key'],
						':uid'				=> $_POST['id']
						);
		$result->execute($values);
		$count = $result->rowCount();
		if($count == 1){
			// mettre à jour le mot de passe
			$updsql = "UPDATE users SET password=:password, updated=NOW() WHERE id=:id";
			$updresult = $db->prepare($updsql);
			$values = array(':password'		=> $pass_hash,
							':id'			=> $_POST['id']
							);
			$updres = $updresult->execute($values);

			$usersql = "SELECT * FROM users WHERE id=?";
	        $userresult = $db->prepare($usersql);
	        $userresult->execute(array($_POST['id']));
	        $user = $userresult->fetch(PDO::FETCH_ASSOC);
			if($updres){
				// supprimez le Token de réinitialisation de la table password_reset et envoyez un e-mail
				$delsql = "DELETE FROM password_reset WHERE reset_token=?";
				$delresult = $db->prepare($delsql);
				$delres = $delresult->execute(array($_POST['key']));
				if($delres){
					// envoie d'email
					$mail = new PHPMailer(true);

	                try {

	                    $mail->isSMTP(); //Configurer l'expéditeur pour qu'il utilise SMTP
	                    $mail->Host       = $smtphost;  // Spécifiez les serveurs SMTP principaux et de secours
	                    $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP
	                    $mail->Username   = $smtpuser;                     // Nom d'utilisateur SMTP
	                    $mail->Password   = $smtppass;                               // Mot de passe SMTP 
	                    $mail->SMTPSecure = 'tls';                                  // Activer le cryptage TLS, `ssl` est également accepté
	                    $mail->Port       = 587;                                    // Port TCP auquel se connecter

	                    //destinataire
	                    $mail->setFrom('test@example.com', 'Vivek Vengala');
	                    $mail->addAddress($user['email'], $user['username']);     // Ajouter un destinataire

	                    // Contenu
	                    $mail->isHTML(true);                                  // Définir le format d'e-mail sur HTML
	                    $mail->Subject = 'Mot de passe modifié';
	                    $mail->Body    = "Le mot de passe de votre compte a été mis à jour, connectez-vous à votre compte";
	                    $mail->AltBody = 'Il s agit du corps en texte brut pour les clients de messagerie non HTML';

	                    $mail->send();
	                    //$messages[] = 'Mot de passe mis à jour, e-mail de confirmation envoyé';
	                    header("location: login.php");
	                } catch (Exception $e) {
	                    echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
	                }
				}
			}
		}
    }

}

// 1. Créer un CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();

// vérifier que le Token de réinitialisation est valide ou non
$sql = "SELECT * FROM password_reset WHERE reset_token=:reset_token AND uid=:uid";
$result = $db->prepare($sql);
$values = array(':reset_token'		=> $_GET['key'],
				':uid'				=> $_GET['id']
				);
$result->execute($values);
$count = $result->rowCount();
if($count == 1){
	// sélectionnez la requête sql pour récupérer les détails de l'utilisateur à partir de la table des utilisateurs à l'aide de l'identifiant de l'utilisateur
	$usersql = "SELECT * FROM users WHERE id=?";
	$userresult = $db->prepare($usersql);
	$userresult->execute(array($_GET['id']));
	$usercount = $userresult->rowCount();
	$userres = $userresult->fetch(PDO::FETCH_ASSOC);
}else{
	$errors[] = "Il y a un problème avec la réinitialisation du Token, contactez l'administrateur du site !";
}
if(!isset($_GET['key']) || !isset($_GET['id'])){ header("location: login.php");}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Password</h3>
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
                    <form role="form" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                        <input type="hidden" name="key" value="<?php echo $_GET['key']; ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Name" name="username" type="text" autofocus value="<?php if(isset($userres['username'])){ echo $userres['username']; } ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php if(isset($userres['email'])){ echo $userres['email']; } ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Repeat Password" name="passwordr" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Modifier le mot de passe" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
