<?php error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE); ?>
<?php
//Import SQL PDO config
require_once "config.php";
//Set vars and reset id_err var
$id_err = "";
$enabled = "enabled";
$isEnabled = "'true'";
$err_addItem = "";
$articleImage = "";

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
        case 'add':
        if(empty(trim($_POST["itemName"]))){
            print_r("Il manque le nom<br>");
            $err_addItem = "Erreur";
        } else{
            $itemName = trim($_POST["itemName"]);
        }
        if(trim($_POST["itemCategory"]) == "nothing"){
            print_r("Il manque la catégorie<br>");
            $err_addItem = "Erreur";
        } else{
            $itemCategory = trim($_POST["itemCategory"]);
        }
        if(empty(trim($_POST["itemPrice"]))){
            print_r("Il manque le prix<br>");
            $err_addItem = "Erreur";
        } else{
            $itemPrice = trim($_POST["itemPrice"]);
        }
        if(empty(trim($_POST["itemsInStock"]))){
            print_r("Il manque le nombre de stock<br>");
            $err_addItem = "Erreur";
        } else{
            $itemStock = trim($_POST["itemsInStock"]);
        }
        if(empty(trim($_POST["itemEnabled"]))){
            print_r("erreur<br>");
            $err_addItem = "Erreur";
        } else{
            $itemState = trim($_POST["itemEnabled"]);
        }
        if(empty(trim($_POST["itemDesc"]))){
            print_r("Il manque la description<br>");
            $err_addItem = "Erreur";
        } else{
            $itemDesc = trim($_POST["itemDesc"]);
        }

        //$itemImageTemp = addslashes(file_get_contents());
        $itemImageName = $_FILES["itemImage"]["name"];
        $itemImageTemp = addslashes(file_get_contents($_FILES['itemImage']['tmp_name']));


        if (empty($err_addItem)) {
          //If no error --> GOOOO
          $sql = "INSERT INTO `Articles` (`categorie`, `nom_article`, `prix`, `stock`, `enabled`, `description`) VALUES (:categoryItem, :nameItem, :priceItem, :stockItem, :stateItem, :descItem)";
          if ($stmt = $pdo->prepare($sql))
          {
              // Mise à bien des variables pour la requête
              $stmt->bindParam(":categoryItem", $itemCategory, PDO::PARAM_STR);
              $stmt->bindParam(":nameItem", $itemName, PDO::PARAM_STR);
              $stmt->bindParam(":priceItem", $itemPrice, PDO::PARAM_STR);
              $stmt->bindParam(":stockItem", $itemStock, PDO::PARAM_STR);
              $stmt->bindParam(":stateItem", $itemState, PDO::PARAM_STR);
              $stmt->bindParam(":descItem", $itemDesc, PDO::PARAM_STR);
              // Exécution de la requête SQL


              if ($stmt->execute())
              {
                  print_r("L'article a bien été ajouté !!");

                  //Get the article that was just been created
                  $sth = $pdo->prepare('SELECT `id_article` FROM `Articles` WHERE `nom_article` = :itemName');
                  $sth->bindParam(':itemName', $itemName, PDO::PARAM_STR);
                  $sth->execute();
                  $result4 = $sth->fetchAll(\PDO::FETCH_ASSOC);

                  foreach ($result4 as $key) {
                    print_r("<br>ID DE LARTICLE CREE : ".$key["id_article"]);
                    $articleImage = $key["id_article"];
                  }


    // Uploads files
    // name of the uploaded file
    $filename = $_FILES['itemImage']['name'];
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['itemImage']['tmp_name'];
    $size = $_FILES['itemImage']['size'];

    if (!in_array($extension, ['png'])) {
      $sql = "DELETE FROM `Articles` WHERE `Articles`.`id_article` = $articleImage";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
        echo "You file extension must be .png";
    } elseif ($_FILES['itemImage']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
      $sql = "DELETE FROM `Articles` WHERE `Articles`.`id_article` = $articleImage";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO Images (nom_image, taille_image, article)VALUES ('$filename', $size, $articleImage)";
            if ($stmt = $pdo->prepare($sql))
            if ($stmt->execute())
            {
                echo "File uploaded successfully";
            }
        } else {
          $sql = "DELETE FROM `Articles` WHERE `Articles`.`id_article` = $articleImage";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
            echo "Failed to upload file. Article add is canceled";
        }
    }
              }
            }/* PREPARE*/
        } else {
          print_r("There was an error");
        }

          break;
          //If we want to delete an article and his linked image
        case 'delete':
        print_r($idForm);
        $sth = $pdo->prepare("SELECT * FROM Articles WHERE id_article LIKE $idForm");
        $sth->execute();
        $resultID = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (!empty($resultID)) {
          $sth = $pdo->prepare("DELETE FROM `Images` WHERE `article` = $idForm");
          if ($sth->execute()) {
            $sth = $pdo->prepare("DELETE FROM `Articles` WHERE `Articles`.`id_article` = $idForm");
            $sth->execute();
            print_r("Article supprimé");
          } else {
            echo "Article non supprimé.";
          }
        } else {
          echo "id existe pas";
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
  <script src="js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include "header.php"?>
  <h3>Add item</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
      <label for="itemName">Name : </label>
      <input name="itemName" type="text" value=""><br>
      <label for="itemCategory">Category : </label>
      <select id="itemCategoryList" name="itemCategory">
        <option value="nothing" class="boldOption">Choose category ...</option>
        <?php
        require_once "config.php";
        $pdo->exec('SET NAMES utf8');
        $sth = $pdo->prepare("SELECT * FROM Categories");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $categorie = "categorie";
        $valueNumber = 1;
        foreach ($result as $data) {
         print_r('<option value = "'.$valueNumber.'">'.$data[$categorie].'</option>');
         $valueNumber =+1;
        }
        //Close SQL connection
        $pdo->connection = null;
        ?>
      </select><br>
      <label for="itemPrice">Price : </label>
      <input name="itemPrice" type="number"><br>
      <label for="itemsInStock">In stock : </label>
      <input name="itemsInStock" type="number"><br>
      <label for="itemDesc">Description : </label>
      <input name="itemDesc" type="text"><br>
      <label for="itemEnabled">Item state : </label>
      <input name="itemEnabled" type="radio" value="true" checked="checked">Enabled
      <input name="itemEnabled" type="radio" value="false">Disabled<br>
      <label for="itemImage">Image : </label>
      <input name="itemImage" type="file" required><br>
      <input name="dowhat" type="text" value="add" hidden>
      <input name="id" type="text" value="1" hidden>
      <br><input type="submit" value="Add">
    </form>

    <div class="spacer"></div>
    <h3>Delete item</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
     <input type="text" name="id">
     <input name="dowhat" type="text" value="delete" hidden>
     <input type="submit" name="deleteItem" value="Delete">
    </form>

  <div class="spacer"></div>
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
    $nom = "nom_article";
    $id = "id_article";
    $enabled = "enabled";
    $stock = "stock";
    $nom_image = "nom_image";
    $description = "description";

      //Import PDO config
      require_once "config.php";
      //SQL query to select all articles
      $sth = $pdo->prepare("SELECT * FROM Articles");
      $sth->execute();
      $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
      print_r("<h4>All items</h4>");
      //Display ID, Name and Enabled
      foreach ($result as $ok) {
        print_r($ok[$id]." -- ");
        print_r($ok[$nom]." -- ");
        print_r($ok[$stock]." -- ");
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

    <h4>Items w/ pictures</h4>
    <table>
      <tbody>
        <tr>
          <td>ID</td>
          <td>Nom de l'article</td>
          <td>Nbre en stock</td>
          <td>Activé ?</td>
          <td>Commentaire</td>
          <td>Image de l'article</td>
        </tr>
        <?php
        $sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
        $sth->execute();
        $result3 = $sth->fetchAll(\PDO::FETCH_ASSOC);

          foreach ($result3 as $ok) {
          print_r("<tr>");
          print_r("<td>".$ok[$id]."</td>");
          print_r("<td>".$ok[$nom]."</td>");
          print_r("<td>".$ok[$stock]."</td>");
          print_r("<td>".$ok[$enabled]."</td>");
          print_r("<td>".$ok[$description]."</td>");
          print_r('<td><img src="uploads/'.$ok[$nom_image].'" width="200" height="200"></td>');
          print_r("</tr>");
        } ?>
      </tbody>
    </table>

  </div>
</body>

</html>
