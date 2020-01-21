<?php
//Import SQL PDO config
require_once "config.php";
//Set vars and reset id_err var
$id_err = "";
$password_err = "";
$enabled = "enabled";
$isEnabled = "'true'";
//Listen if a post request was triggered
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Check if the ID is entered. If not, fill id_err
    if (empty(trim($_POST["InputCustomerID"])))
    {
        $id_err = "Merci d'entrer un ID";
    }
    else
    {
        $idForm = trim($_POST["InputCustomerID"]);
    }
    //Take what to do (disable, enable, change-passwd and delete), in follow to what form
    $dowhatForm = trim($_POST["doWhat"]);
    //If the id_err has something in it (obviously, an error), the script stops here
    if (!empty($id_err))
    {
        print_r($id_err);
        //else, the script beggin

    }
    else
    {
        //"Generic" SQL query to check if some customers have the given ID.
        //Will be used for disable and enable switch statement.
        //I set it here to avoid redoudancy with 2 time the same query
        $sth = $pdo->prepare("SELECT * FROM Clients WHERE id_client LIKE $idForm");
        $sth->execute();
        $result1 = $sth->fetchAll(\PDO::FETCH_ASSOC);
        //Because of a bug, encode and force decode JSON w/ output of the SQL query to have a working foreach
        $a1 = json_encode($result1);
        $a2 = json_decode($a1, true);
        switch ($dowhatForm)
        {
                //If we wanted to enable the article

            case 'Enable':
                //Check if something have the ID given
                if (!empty($result1))
                {
                    foreach ($a2 as $ok)
                    {
                        //If there is an id, check if it's already enabled
                        if ($ok["actif"] == "true")
                        {
                            print_r("Already enabled !");
                            //If not, enable it

                        }
                        elseif ($ok["actif"] == "false")
                        {
                            print_r("Enable item ....");
                            //UPDATE sql statement to update the "actif" row with "true"
                            $sth = $pdo->prepare("UPDATE `Clients` SET `actif` = 'true' WHERE `Clients`.`id_client` = $idForm");
                            $sth->execute();
                            print_r("ok");
                        }
                    }
                    //If the ID doesn't return anything (Empty, so no customer w/ this id)

                }
                else
                {
                    print_r("array vide");
                }
            break;
                //If we wanted to disable the customer

            case 'Disable':
                //Check if something have the ID given
                if (!empty($result1))
                {
                    foreach ($a2 as $ok)
                    {
                        //If there is an id, check if it's already disabled
                        if ($ok["actif"] == "false")
                        {
                            print_r("Already disabled !");
                            //If not, disable it

                        }
                        elseif ($ok["actif"] == "true")
                        {
                            print_r("Disable item ....");
                            //UPDATE sql statement to update the "actif" row with "false"
                            $sth = $pdo->prepare("UPDATE `Clients` SET `actif` = 'false' WHERE `Clients`.`id_client` = $idForm");
                            $sth->execute();
                            print_r("ok");
                        }
                    }
                    //If the ID doesn't return anything (Empty, so no customer w/ this id)

                }
                else
                {
                    print_r("array vide");
                }
            break;
                //If we want to change the password of the given customer

            case 'Change-passwd':
                $sth = $pdo->prepare("SELECT * FROM Clients WHERE id_client LIKE $idForm");
                $sth->execute();
                $result1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

                if (!empty($result1))
                {
                    if (empty(trim($_POST["newPassword"])))
                    {
                        $password_err = "Merci d'entrer le nouveau mot de passe";
                    }
                    else
                    {
                        $newPassword = trim($_POST["newPassword"]);
                        $password_err = "";
                    }
                    //If the id_err has something in it (obviously, an error), the script stops here
                    if (!empty($password_err))
                    {
                        print_r($password_err);
                        //else, the script beggin

                    }
                    else
                    {
                        $sql = "UPDATE Clients SET pwd = :passwordNew WHERE id_client = :id";
                        if ($stmt = $pdo->prepare($sql))
                        {
                            // Mise à bien des variables pour la requête
                            $stmt->bindParam(":passwordNew", $param_password, PDO::PARAM_STR);
                            $stmt->bindParam(":id", $idForm, PDO::PARAM_STR);
                            // Set les params
                            $salt_password = "i;151-120#";
                            $param_password = hash("sha256", $newPassword . $salt_password);
                            // Exécution de la requête SQL
                            if ($stmt->execute())
                            {
                                print_r("Le mot de passe a bien été changé !");
                            }
                        }
                    }
                }
                else
                {
                    print_r("ID Non trouvé");
                }
            break;
            //If we want to delete an account
            case 'Delete':
            $sth = $pdo->prepare("SELECT * FROM Clients WHERE id_client LIKE $idForm");
            $sth->execute();
            $result1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

            if (!empty($result1)){
              $sql = "DELETE FROM Clients WHERE `Clients`.`id_client` = :id";
              if ($stmt = $pdo->prepare($sql))
              {
                  // Mise à bien des variables pour la requête
                  $stmt->bindParam(":id", $idForm, PDO::PARAM_STR);
                  // Exécution de la requête SQL
                  if ($stmt->execute())
                  {
                      print_r("Le compte a bien été supprimé !");
                  }
                }
            } else {
              print_r("ID Non trouvé");
            }
              break;
              //If we want to toggle admin rights for an account
              case 'Toggle-admin':
              $sth = $pdo->prepare("SELECT * FROM Clients WHERE id_client LIKE $idForm");
              $sth->execute();
              $result1 = $sth->fetchAll(\PDO::FETCH_ASSOC);
              if (!empty($result1)){
                $sth = $pdo->prepare("SELECT admin FROM Clients WHERE id_client LIKE $idForm");
                $sth->execute();
                $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
                $isAdmin = json_decode(json_encode($result));

                $toggleAdmin = $isAdmin[0]->admin;

                if ($toggleAdmin == 0) {
                  $sth = $pdo->prepare("UPDATE `Clients` SET `admin` = '1' WHERE `Clients`.`id_client` = $idForm");
                  $sth->execute();
                  print_r("Le mode admin a été activé");
                } elseif ($toggleAdmin == 1) {
                  $sth = $pdo->prepare("UPDATE `Clients` SET `admin` = '0' WHERE `Clients`.`id_client` = $idForm");
                  $sth->execute();
                  print_r("Le mode admin a été désactivé");
                }

              } else {
                print_r("ID Non trouvé");
              }
                break;
        }
    }
}
//Close SQL connection
$pdo->connection = null;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <body>
    <div class="">
      <h3>Accounts management</h3>
      <br>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="InputCustomerID" value="" placeholder="Customer ID ...">
        <input type="submit" name="doWhat" value="Enable">
        <input type="submit" name="doWhat" value="Disable">
        <input type="submit" name="doWhat" value="Toggle-admin">
        <input type="password" name="newPassword" value="" placeholder="New password ...">
        <input type="submit" name="doWhat" value="Change-passwd">
        <input type="submit" name="doWhat" value="Delete">
        <?php echo (!empty($id_err)) ?>
      </form>

    </div>
    <div class="spacer"></div>
    <div class="">
      <h5>Accounts list :</h5>
      <br>
      <?php
      $id = "id_client";
      $mail = "mail";
      $actif = "actif";
      $admin = "admin";
      $customerCreated = "customerCreated";

      require_once "config.php";
      $sth = $pdo->prepare("SELECT * FROM Clients");
      $sth->execute();
      $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

      print_r("ID -- Mail -- Actif -- Admin -- customerCreated :<br>");
      //Display ID, Name and Enabled
      foreach ($result as $ok) {
        print_r($ok[$id]." -- ");
        print_r($ok[$mail]." -- ");
        print_r($ok[$actif]." -- ");
        print_r($ok[$admin]." -- ");
        print_r($ok[$customerCreated]."<br>");
      }
      print_r("<br><h5>Only enabled accounts :</h5><br>");
      //Display only enabled articles
      foreach ($result as $ok) {
        if ($ok[$actif] == "true") {
          print_r($ok[$id]." -- ");
          print_r($ok[$mail]." <br> ");
        }
      }
      //Close SQL connection
      $pdo->connection = null;
      ?>
    </div>
  </body>
</html>
