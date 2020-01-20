<?php
//Import SQL PDO config
require_once "config.php";
//Set vars and reset id_err var
$id_err = "";
$enabled = "enabled";
$isEnabled = "'true'";
//Listen if a post request was triggered
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Check if the ID is entered. If not, fill id_err
    if(empty(trim($_POST["id"]))){
        $id_err = "Merci d'entrer un ID";
    } else{
        $idForm = trim($_POST["id"]);
    }
    //Take what to do (disable or enable), in follow to what form
    $dowhatForm = trim($_POST["dowhat"]);
    //If the id_err has something in it (obviously, an error), the script stops here
    if (!empty($id_err)) {
      print_r("ID vide");
    //else, the script beggin
    } else {
      //"Generic" SQL query to check if some article have the given ID.
      //Will be used for disable and enable switch statement.
      //I set it here to avoid redoudancy with 2 time the same query
      $sth = $pdo->prepare("SELECT * FROM Articles WHERE id_article LIKE $idForm");
      $sth->execute();
      $result1 = $sth->fetchAll(\PDO::FETCH_ASSOC);
      //Because of a bug, encode and force decode JSON w/ output of the SQL query to have a working foreach
      $a1 = json_encode($result1);
      $a2 = json_decode($a1, true);
      switch ($dowhatForm) {
        //If we wanted to enable the article
        case 'enable':
          //Check if something have the ID given
          if (!empty($result1)) {
            foreach ($a2 as $ok) {
              //If there is an id, check if it's already enabled
              if ($ok["enabled"] == "true") {
                print_r("Already enabled !");
              //If not, enable it
              } elseif ($ok["enabled"] == "false") {
                print_r("Enable item ....");
                //UPDATE sql statement to update the "enabled" row with "true"
                $sth = $pdo->prepare("UPDATE `Articles` SET `enabled` = 'true' WHERE `Articles`.`id_article` = $idForm");
                $sth->execute();
                print_r("ok");
              }
            }
          //If the ID doesn't return anything (Empty, so no article w/ this id)
          } else {
            print_r("array vide");
          }
          break;
        //If we wanted to disable the article
        case 'disable':
        //Check if something have the ID given
        if (!empty($result1)) {
          foreach ($a2 as $ok) {
            //If there is an id, check if it's already disabled
            if ($ok["enabled"] == "false") {
              print_r("Already disabled !");
            //If not, disable it
            } elseif ($ok["enabled"] == "true") {
              print_r("Disable item ....");
              //UPDATE sql statement to update the "enabled" row with "false"
              $sth = $pdo->prepare("UPDATE `Articles` SET `enabled` = 'false' WHERE `Articles`.`id_article` = $idForm");
              $sth->execute();
              print_r("ok");
            }
          }
        //If the ID doesn't return anything (Empty, so no article w/ this id)
        } else {
          print_r("array vide");
        }
          break;
      }
    }
}
//Close SQL connection
$pdo->connection = null;
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
  <h3>Enable item</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <label for="itemid">Wich item (id) ? </label>
      <input type="text" name="id" value="">
      <input type="text" name="dowhat" value="enable" hidden>
      <input type="submit" value="Submit">
      <?php echo (!empty($id_err)) ?>
    </form>
    <div class="spacer"></div>
      <h3>Disable item</h3>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <label for="itemid">Wich item (id) ? </label>
          <input type="text" name="id" value="">
          <input type="text" name="dowhat" value="disable" hidden>
          <input type="submit" value="Submit">
          <?php echo (!empty($id_err)) ?>
        </form>
  <div class="">
    <h4>Liste des articles</h4>

    <?php
    //Set var
    $nom = "nom";
    $id = "id_article";
    $enabled = "enabled";
      //Import PDO config
      require_once "config.php";
      //SQL query to select all articles
      $sth = $pdo->prepare("SELECT * FROM Articles");
      $sth->execute();
      $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
      print_r("ID -- Nom -- Enabled :<br>");
      //Display ID, Name and Enabled
      foreach ($result as $ok) {
        print_r($ok[$id]." -- ");
        print_r($ok[$nom]." -- ");
        print_r($ok[$enabled]."<br>");
      }
      print_r("<br><h3>Only enabled articles :</h3><br>");
      //Display only enabled articles
      foreach ($result as $ok) {
        if ($ok[$enabled] == "true") {
          print_r($ok[$id]." -- ");
          print_r($ok[$nom]." <br> ");
        }
      }
      //Close SQL connection
      $pdo->connection = null;
    ?>

  </div>
</body>

</html>
