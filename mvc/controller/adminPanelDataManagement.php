<?php
include "config.php";
$addError;
$addSuccess;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $dowhatForm = trim($_POST["doWhat"]);
  switch ($dowhatForm) {
    case 'addItem':
      if (empty($_POST['nameItem'])) {
        $addError = "Il manque le nom de l'article";
      } else {
        $addName = trim($_POST['nameItem']);
        if (empty($_POST['catItem'])) {
          $addError = "Il manque la catégorie de l'article";
        } else {
          $addCat = trim($_POST['catItem']);
          if (empty($_POST['priceItem'])) {
            $addError = "Il manque le prix de l'article";
          } else {
            $addPrice = trim($_POST['priceItem']);
            if (empty($_POST['stockItem'])) {
              $addError = "Il manque le stock de l'article";
            } else {
              $addStock = trim($_POST['stockItem']);
              if (empty($_POST['descItem'])) {
                $addError = "Il manque la description de l'article";
              } else {
                $addDesc = trim($_POST['descItem']);
                if (empty($_POST['itemStatus'])) {
                  $addError = "Il manque le status de l'article";
                } else {
                  $addStatus = trim($_POST['itemStatus']);
                  }}}}}}

                  if (empty($addError)) {
                    //$itemImageTemp = addslashes(file_get_contents());
                    $itemImageName = $_FILES["imageItem"]["name"];
                    $itemImageTemp = addslashes(file_get_contents($_FILES['imageItem']['tmp_name']));


                    $sql = "INSERT INTO Articles (categorie, nom_article, prix_unitaire, stock, enabled, description) VALUES (:categoryItem, :nameItem, :priceItem, :stockItem, :stateItem, :descItem)";
                    $stmt = $pdo->prepare($sql);
                        // Set params
                        $stmt->bindParam(":nameItem", $addName, PDO::PARAM_STR);
                        $stmt->bindParam(":categoryItem", $addCat, PDO::PARAM_STR);
                        $stmt->bindParam(":priceItem", $addPrice, PDO::PARAM_STR);
                        $stmt->bindParam(":stockItem", $addStock, PDO::PARAM_STR);
                        $stmt->bindParam(":descItem", $addDesc, PDO::PARAM_STR);
                        $stmt->bindParam(":stateItem", $addStatus, PDO::PARAM_STR);
                        // Execute SQL
                        $stmt->execute();

                        $articleImage = $pdo->lastInsertId();
                            // Uploads files
                            // name of the uploaded file
                            $filename = $_FILES['imageItem']['name'];
                            // destination of the file on the server
                            $destination = 'uploads/' . $filename;
                            // get the file extension
                            $extension = pathinfo($filename, PATHINFO_EXTENSION);
                            // the physical file on a temporary uploads directory on the server
                            $file = $_FILES['imageItem']['tmp_name'];
                            $size = $_FILES['imageItem']['size'];

                            if (!in_array($extension, ['png'])) {
                              $sql = "DELETE FROM Articles WHERE id_article = :id";
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(":id", $articleImage, PDO::PARAM_STR);
                              $stmt->execute();
                              echo "You file extension must be .png";
                            } elseif ($_FILES['imageItem']['size'] > 5000000) { // file shouldn't be larger than 5 Megabyte
                              $sql = "DELETE FROM Articles WHERE Articles.id_article = $articleImage";
                              $stmt = $pdo->prepare($sql);
                              $stmt->execute();
                              //echo "File too large!";
                            } else {
                              // move the uploaded (temporary) file to the specified destination
                              if (move_uploaded_file($file, $destination)) {
                                $sql = "INSERT INTO Images (id_image, article, taille_image, nom_image) VALUES (NULL, :article, :size, :filename)";
                                $stmt = $pdo->prepare($sql);
                                    // Set params
                                    $stmt->bindParam(":article", $articleImage, PDO::PARAM_STR);
                                    $stmt->bindParam(":size", $size, PDO::PARAM_STR);
                                    $stmt->bindParam(":filename", $filename, PDO::PARAM_STR);
                                    // Execute SQL
                                    $stmt->execute();
                                  //echo "File uploaded successfully";
                                  $addSuccess = "L'article a bien été créé ! ID : ".$articleImage." ";
                              } else {
                                $sql = "DELETE FROM Articles WHERE Articles.id_article = $articleImage";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                //echo "Failed to upload file. Article add is canceled";
                              }
                            }
                          }
      break;

    case 'editItem':
    if (!empty($_POST['modalIdItem'])) {
      $itemID = $_POST['modalIdItem'];
    }
    if (!empty($_POST['modalNameItem'])) {
      $itemNewName = $_POST['modalNameItem'];
    }
    if (!empty($_POST['modalCatItem'])) {
      $itemNewCat = $_POST['modalCatItem'];
    }
    if (!empty($_POST['modalDescItem'])) {
      $itemNewDesc = $_POST['modalDescItem'];
    }
    if (!empty($_POST['modalPriceItem'])) {
      $itemNewPrice = $_POST['modalPriceItem'];
    }
    if (!empty($_POST['modalStockItem'])) {
      $itemNewStock = $_POST['modalStockItem'];
    }
    if (!empty($_POST['modalImageItem'])) {
      $itemNewImage = $_POST['modalImageItem'];
    }
    if (!empty($_POST['stateItem'])) {
      $itemNewState = $_POST['stateItem'];
    }

    $sql = "UPDATE Articles SET categorie = :cat, nom_article = :name, description = :description, prix_unitaire = :price, stock = :stock, enabled = :state WHERE Articles.id_article = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $itemID, PDO::PARAM_STR);
    $stmt->bindParam(":name", $itemNewName, PDO::PARAM_STR);
    $stmt->bindParam(":cat", $itemNewCat, PDO::PARAM_STR);
    $stmt->bindParam(":description", $itemNewDesc, PDO::PARAM_STR);
    $stmt->bindParam(":price", $itemNewPrice, PDO::PARAM_STR);
    $stmt->bindParam(":stock", $itemNewStock, PDO::PARAM_STR);
    //$stmt->bindParam(":addrDefault", $itemNewImage, PDO::PARAM_STR);
    $stmt->bindParam(":state", $itemNewState, PDO::PARAM_STR);
    $stmt->execute();
      break;

    case 'editCustomer':
    if (!empty($_POST['idAccount'])) {
      $accountID = $_POST['idAccount'];
    }
    if (!empty($_POST['adminAccount'])) {
      $accountAdmin = $_POST['adminAccount'];
    } elseif ($_POST['adminAccount'] != 1) {
      $accountAdmin = "0";
    }
    if (!empty($_POST['stateAccount'])) {
      $accountState = $_POST['stateAccount'];
    }

    $sql = "UPDATE Clients SET admin = :admin, active = :state WHERE Clients.id_client = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $accountID, PDO::PARAM_STR);
    $stmt->bindParam(":admin", $accountAdmin, PDO::PARAM_STR);
    $stmt->bindParam(":state", $accountState, PDO::PARAM_STR);
    $stmt->execute();
      break;

      case 'editOrders':
      if (!empty($_POST['idOrder'])) {
        $orderID = $_POST['idOrder'];
      }
      if (!empty($_POST['stateOrder'])) {
        $orderState = $_POST['stateOrder'];
      }

      $sql = "UPDATE Commandes SET etat = :state WHERE Commandes.id_commande = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":id", $orderID, PDO::PARAM_STR);
      $stmt->bindParam(":state", $orderState, PDO::PARAM_STR);
      $stmt->execute();
      break;

      case 'editComments':
      if (!empty($_POST['idComment'])) {
        $commentID = $_POST['idComment'];
      }
      if (!empty($_POST['commentComment'])) {
        $commentText = $_POST['commentComment'];
      }
      if (!empty($_POST['stateComment'])) {
        $commentState = $_POST['stateComment'];
      }

      $sql = "UPDATE Commentaires SET commentaire = :cText, visible = :state WHERE Commentaires.id_commentaire = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":id", $commentID, PDO::PARAM_STR);
      $stmt->bindParam(":cText", $commentText, PDO::PARAM_STR);
      $stmt->bindParam(":state", $commentState, PDO::PARAM_STR);
      $stmt->execute();
        break;
  }
}
?>
