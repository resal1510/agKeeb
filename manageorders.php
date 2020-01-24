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

              $nom = "nom";
              $quantity = "quantité";
              $prix = "prix";
              $idCommande = "id_commande";
              $nbre = 1;


              foreach ($result as $ok) {
                $finished = "false";

                while ($finished == "false") {
                  $ordernumber = $ok[$idCommande];

                    if ($ordernumber == $nbre) {
                      print_r("<br> Numéro commande : ".$ok[$idCommande]);
                      print_r("<br> ok mec : ".$ok[$nom]);
                      print_r("<br> ok mec : ".$ok[$quantity]);
                      print_r("<br> ok mec : ".$ok[$prix]);
                      $finished = "true";
                      $nbre = 1;
                    } else {
                      $nbre++;

                    }
                }
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
  <script src="/js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div>
    <h3>List customer orders</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <label for="customerID">Wich customer ? </label>
      <input type="text" name="customerID" value="">
      <input type="text" name="dowhat" value="listOrders" hidden>
      <input type="submit" value="Submit">
      <?php echo (!empty($id_err)) ?>

      <div class="listOrders">
        <h4><?php print_r(!empty($actualOrder)); ?></h4>
        <?php print_r("ok : ".!empty($ok[$nom])); ?>
        <?php print_r(!empty($actualQty)); ?>
        <?php print_r(!empty($actualPrice)); ?>
      </div>
    </form>
  </div>
  <div class="spacer"></div>
  <div>
    <h3>Manage an order</h3>

  </div>
</body>

</html>
