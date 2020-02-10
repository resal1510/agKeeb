<?php
// Initialiser la session
session_start();
// Check si le user est déjà connecté. Si oui, le rediriger vers index.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
// Inclure le fichier de config sql
require_once "config.php";
// Définition des variables et les clean
$email = $password = "";
$email_err = $password_err = "";
// Traitement des données une fois que le formulaire est validé
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifier si le user est vide
    if(empty(trim($_POST["email"]))){
        $email_err = "Merci d'entrer un nom d'utilisateur";
    } else{
        $email = trim($_POST["email"]);
    }
    // Vérifier si le mdp est vide
    if(empty(trim($_POST["password"]))){
        $password_err = "Merci d'entrer un mot de passe.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Vérifier les user et mdp
    if(empty($email_err) && empty($password_err)){
        // Préparation de la requête SQL
        $sql = "SELECT id_client, mail, pwd FROM Clients WHERE mail = :mail";
        // A TESTER $sql = "SELECT id_client, mail, mot_de_passe FROM Clients WHERE mail = :email";
        if($stmt = $pdo->prepare($sql)){
            // Mise à bien des variables pour la requête
            $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
            // Set les params
            $param_email = trim($_POST["email"]);
            // Exécution de la requête SQL
            if($stmt->execute()){
                // Check si le user et le mdp existent, si oui, check si le mdp est juste
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["mail"];
                        $hashed_password = $row["pwd"];
                        $salt_password = "i;151-120#";
                        $check_password = hash("sha256", $password . $salt_password);
                        if($check_password == $hashed_password){
                            // Si le mdp est juste, voir si le compte est désactivé
                            $sql = "SELECT * FROM Clients WHERE mail LIKE :mailCheck";
                            if ($stmt = $pdo->prepare($sql))
                            {
                                // Mise à bien des variables pour la requête
                                $stmt->bindParam(":mailCheck", $param_email, PDO::PARAM_STR);
                                // Exécution de la requête SQL
                                if ($stmt->execute())
                                {
                                    $result1 = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                                    $a1 = json_encode($result1);
                                    $a2 = json_decode($a1, true);

                                    foreach ($a2 as $ok) {
                                        if ($ok["actif"] == "false") {
                                          header("location: disabled-account.php");
                                        } else {
                                          session_start();
                                          // Stockage de la session
                                          $_SESSION["loggedin"] = true;
                                          $_SESSION["id"] = $id;
                                          $_SESSION["email"] = $email;
                                          // Et on redirige sur la page d'accueil
                                          header("location: index.php");
                                        }
                                      }
                                    }
                                }
                        } else{
                            // Message d'erreur si le mdp est faux
                            $password_err = "Login incorrect mdp, merci de réessayer.";
                        }
                    }
                } else{
                    // Message d'erreur si le email est faux
                    $email_err = "Login incorrect mail, merci de réessayer.";
                }
            } else{
                echo "Quelque chose s'est mal passé, merci de réessayer plus tard";
            }
        }
        // finir la requête
        unset($stmt);
    }
    // Fermer la connection à la bdd
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <!-- Set charset, title -->
  <meta charset="utf-8">
  <title>agKeeb Shop</title>
  <!-- Import Bootstrap, jQuery, PopperJS and FontAwesome -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a77b3e076e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Import local JS and CSS files -->
  <script src="/js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="/css/style.css">
</head>
<script>
  $(document).ready(function() {
    console.log("Document ready");
    $("#menuTop").load("menu.html");
  });
</script>

<body>
  <?php include "navbarInclude.php"?>

  <div id="menuTop"></div>

  <div class="spacer"></div>
  <div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <label>email</label>
        <input type="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" name="email" class="form-control" value="<?php echo $email; ?>">
        <span class="help-block"><?php echo $email_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login">
      </div>
    </form>
    Doesn't have an account ? <a href="register.php">Create yours here !</a>
  </div>
</body>

</html>
