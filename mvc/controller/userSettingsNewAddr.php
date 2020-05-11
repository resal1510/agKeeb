<?php
  //Check if everything is entered
  if (!empty($_POST["newName"]) || !empty(trim($_POST["newSurname"])) || !empty(trim($_POST["newAddr"])) || !empty(trim($_POST["newNpa"])) || !empty(trim($_POST["newCity"])) || !empty(trim($_POST["newPhone"]))) {
    //Retrieve all data from POST and set other needed variables
    $newNameShip = $_POST["newName"];
    $newSurnameShip = $_POST["newSurname"];
    $newAddressShip = $_POST["newAddr"];
    $newNpaShip = $_POST["newNpa"];
    $newCityShip = $_POST["newCity"];
    $newPhoneShip = $_POST["newPhone"];
    $tmpDefShip = $_POST["newDefault"];
    $actualCategory = $_POST["newCat"];
    $idCustomer = $_SESSION["idClient"];

    //Set default with 0/1, bc when i pull the input data i have true/false
    switch ($tmpDefShip) {
      case true:
        $newDefault = 1;
        break;
      case false:
        $newDefault = 0;
        break;
    }
    $fDefault = "defaut";
    $fCategory = "categorie";
    $fId = "id_adresse";
    include '/var/www/allanresin2.tk/html/agkeeb/mvc/controller/userSettingsCheckDefault.php';
    //Insert the whole address into the database, with all data from inputs
    include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsAddSQL.php';
  }
?>
