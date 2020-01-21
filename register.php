<?php
// Initialiser la session
session_start();
// Check si le user est déjà connecté. Si oui, le rediriger vers index.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Inclure le fichier de config
require_once "config.php";

// Definir les variables et les clean
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
$customerCreatedDefault = "'false'";
$defaultAdresse = "'5'";
$isActive = "'true'";

// Traitement des données quand le formulaire est validé
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Valider le email
    if(empty(trim($_POST["email"]))){
        $email_err = "Merci d'entrer .";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_client FROM Clients WHERE mail = :mail";
        // A TESTER $sql = "SELECT id_client FROM Clients WHERE mail = :email";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO Clients (mail, pwd, customerCreated, adresse_livraison, adresse_facturation, actif) VALUES (:mail, :pwd, $customerCreatedDefault, $defaultAdresse, $defaultAdresse, $isActive)";
        // A TESTER $sql = "INSERT INTO Clients (mail, mot_de_passe) VALUES (:email, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":pwd", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_email = $email;
            $salt_password = "i;151-120#";
            $param_password = hash("sha256", $password . $salt_password);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

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
  $( document ).ready(function() {
    console.log("Document ready");
    $("#menuTop").load("menu.html");
});
</script>
<body>
  <div id="menuTop"></div>

  <div class="">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
  </div>
</body>

</html>
