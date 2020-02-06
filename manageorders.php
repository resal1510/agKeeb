<?php
//Import SQL PDO config
require_once "config.php";
//Set vars and reset id_err var
$id_err = "";

//Listen if a post request was triggered
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Check if the ID is entered. If not, fill id_err
    if(empty(trim($_POST["customerID"]))){
        $id_err = "Merci d'entrer un ID";
    } else{
        $idForm = trim($_POST["customerID"]);
    }
    $dowhatForm = trim($_POST["dowhat"]);
    //Check if there was an error
    if (!empty($id_err)) {
      print_r($id_err);
    //else, the script beggin
  } else {
    $sth = $pdo->prepare("SELECT * FROM Clients WHERE id_client LIKE $idForm");
    $sth->execute();
    $resultID = $sth->fetchAll(\PDO::FETCH_ASSOC);

    if (!empty($resultID)){
      switch ($dowhatForm) {
        //To list all customer orders
        case 'listOrders':
        /*
        $sth = $pdo->prepare("SELECT * FROM Commandes INNER JOIN Contenu_commandes ON Commandes.id_commande = Contenu_commandes.commande INNER JOIN Articles ON Articles.id_article = Contenu_commandes.article WHERE client LIKE $idForm");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);*/

        $sql = "SELECT * FROM Commandes INNER JOIN Contenu_commandes ON Commandes.id_commande = Contenu_commandes.commande INNER JOIN Articles ON Articles.id_article = Contenu_commandes.article WHERE client LIKE :id";
        if ($stmt = $pdo->prepare($sql))
        {
            // Mise à bien des variables pour la requête
            $stmt->bindParam(":id", $idForm, PDO::PARAM_STR);
            // Exécution de la requête SQL
            if ($stmt->execute())
            {
              $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
              //$a = json_decode(json_encode($result), TRUE);
              $nom = "nom_article";
              $quantity = "quantite";
              $prix = "prix";
              $idCommande = "id_commande";
              $montant = "montant";
              $lastID;
              foreach ($result as $key) {
                if ($lastID == $key[$idCommande]) {
                  print_r("");
                } else {
                  print_r("<br> Numéro commande : ".$key[$idCommande]);
                }
                print_r("<br> Nom article : ".$key[$nom]);
                print_r("<br> Quantité : ".$key[$quantity]);
                print_r("<br> Prix unité : ".$key[$prix]);
                print_r("<br>");
                $lastID = $key[$idCommande];
              }
            }
        }
          break;
        default:
          print_r("default");
          break;
      }
    } else {
      print_r("ID non trouvé");
    }
  }
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
  <script src="js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include "header.php"?>
  <div>
    <h3>List customer orders</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <label for="customerID">Wich customer ? </label>
      <input type="text" name="customerID" value="">
      <input type="text" name="dowhat" value="listOrders" hidden>
      <input type="submit" value="Submit">
      <?php echo (!empty($id_err)) ?>
    </form>
  </div>
  <div class="spacer"></div>
  <div>
    <h3>Delete an order</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <label for="customerID">For wich customer ?</label>
      <input type="text" name="" value="">


      <input type="text" name="dowhat" value="createOrder" hidden>
      <input type="submit" value="Submit">
      <?php echo (!empty($id_err)) ?>
    </form>

    <h3>List all orders</h3>

    <table>
      <tbody>
        <tr>
          <td>ID Commande</td>
          <td>Nom de l'article</td>
          <td>Quantité</td>
          <td>Prix unité</td>
          <td></td>
          <td></td>
        </tr>
        <?php
        $sth = $pdo->prepare("SELECT * FROM Commandes INNER JOIN Contenu_commandes ON Commandes.id_commande = Contenu_commandes.commande INNER JOIN Articles ON Articles.id_article = Contenu_commandes.article");
        $sth->execute();
        $result3 = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $idCommande = "id_commande";
        $nomArticle = "nom_article";
        $quantite = "quantite";
        $prix = "prix";

        $lastID = "";
        foreach ($result3 as $key) {
          if ($lastID == $key[$idCommande]) {
            print_r("<td></td>");
          } else {
            print_r("<td>&nbsp;</td>");
            print_r("<td>".$key[$id]."</td>");
          }
          print_r("<tr>");
          print_r("<td>".$key[$idCommande]."</td>");
          print_r("<td>".$key[$nomArticle]."</td>");
          print_r("<td>".$key[$quantite]."</td>");
          print_r("<td>".$key[$prix]."</td>");
          print_r("<td>".$key[$description]."</td>");
          print_r("</tr>");
          $lastID = $key[$idCommande];
        }

         ?>
      </tbody>
    </table>

  </div>
</body>
</html>
