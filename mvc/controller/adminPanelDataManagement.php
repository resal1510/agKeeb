<?php
$addError; $iEditErr;
$addSuccess; $iEditSuccess;
$nameOldImage;

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
                    $itemImageName = $_FILES["imageItem"]["name"];
                    $itemImageTemp = addslashes(file_get_contents($_FILES['imageItem']['tmp_name']));

                    include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL.php';

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
                              //Delete article when it's not PNG image
                              include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
                              echo "You file extension must be .png";
                            } elseif ($_FILES['imageItem']['size'] > 5000000) { // file shouldn't be larger than 5 Megabyte
                              //Delete if it's larger than 5mb
                              include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
                              //echo "File too large!";
                            } else {
                              // move the uploaded (temporary) file to the specified destination
                              if (move_uploaded_file($file, $destination)) {
                                //Add image details to DB because everything is finally fking okay
                                include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL4.php';
                                  //echo "File uploaded successfully";
                                  $addSuccess = "L'article a bien été créé ! ID : ".$articleImage." ";
                              } else {
                                //Delete item if it's finally not okay
                                include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
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
    } else {
      $iEditErr = "Le nom est vide";
    }
    if (!empty($_POST['modalCatItem'])) {
      $itemNewCat = $_POST['modalCatItem'];
    }
    if (!empty($_POST['modalDescItem'])) {
      $itemNewDesc = $_POST['modalDescItem'];
    } else {
      $iEditErr = "La description est vide";
    }
    if (!empty($_POST['modalPriceItem'])) {
      $itemNewPrice = $_POST['modalPriceItem'];
    } else {
      $iEditErr = "Le prix est vide";
    }
    if (!empty($_POST['modalStockItem'])) {
      $itemNewStock = $_POST['modalStockItem'];
    } else {
      $iEditErr = "Le stock est vide";
    }
    if (!empty($_POST['stateItem'])) {
      $itemNewState = $_POST['stateItem'];
    }

    if (empty($iEditErr)) {
      //Edit item in SQL
      include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataEditItemSQL.php';
      if (!empty($_FILES['modalImageItem']["name"])) {
        $articleImage = $pdo->lastInsertId();
        $sth2 = $pdo->prepare("SELECT * FROM Images WHERE article = $itemID");
        $sth2->execute();
        $resultDeleteOld = $sth2->fetchAll(\PDO::FETCH_ASSOC);
        $nameI = "nom_image";

        foreach ($resultDeleteOld as $key) {
          $nameOldImage = '/var/www/allanresin2.tk/html/agkeeb/uploads/' . $key[$nameI];
        }

        // Uploads files
        // name of the uploaded file
        $filename = $_FILES['modalImageItem']['name'];
        // destination of the file on the server
        $destination = 'uploads/' . $filename;
        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['modalImageItem']['tmp_name'];
        $size = $_FILES['modalImageItem']['size'];

        if (!in_array($extension, ['png'])) {
          //Delete article when it's not PNG image
          include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
          $iEditErr = "L'image doit être en format .png";
        } elseif ($_FILES['modalImageItem']['size'] > 5000000) { // file shouldn't be larger than 5 Megabyte
          //Delete if it's larger than 5mb
          include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
          $iEditErr = "L'image ne doit pas dépasser 5 Mb";
        } else {
          // move the uploaded (temporary) file to the specified destination
          if (move_uploaded_file($file, $destination)) {
            //Add image details to DB because everything is finally fking okay
            //$iEditSuccess = "L'article ".$itemID." a bien été modifié !";
              $sql = "UPDATE Images SET taille_image = :size, nom_image = :filename WHERE Images.article = :id";
              $stmt = $pdo->prepare($sql);
              // Set params
              $stmt->bindParam(":size", $size, PDO::PARAM_STR);
              $stmt->bindParam(":filename", $filename, PDO::PARAM_STR);
              $stmt->bindParam(":id", $itemID, PDO::PARAM_STR);
              // Execute SQL
              $stmt->execute();
              unlink($nameOldImage);
          } else {
            //Delete item if it's finally not okay
            include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataAddItemSQL3.php';
            $iEditErr = "Quelque chose s'est mal passé. Merci de réessayer";
          }
        }
      }
      if (empty($iEditErr)) {
        $iEditSuccess = "L'article ".$itemID." a bien été modifié !";
      }
    }
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

      //Edit customer in SQL
      include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataEditCustomerSQL.php';
      break;

      case 'editOrders':
      if (!empty($_POST['idOrder'])) {
        $orderID = $_POST['idOrder'];
      }
      if (!empty($_POST['stateOrder'])) {
        $orderState = $_POST['stateOrder'];
      }

      include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataEditOrdersSQL.php';
      break;

      case 'editComments':
      if (!empty($_POST['idComment'])) {
        $commentID = $_POST['idComment'];
      }
      if (!empty($_POST['stateComment'])) {
        $commentState = $_POST['stateComment'];
      }

        //Edit comment in SQL
        include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelDataEditCommentsSQL.php';
        break;
  }
}
?>
