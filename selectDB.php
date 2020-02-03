<select id="orderCustomerID" name="customerID">
  <option value="nothing" class="boldOption">Choose customer ...</option>
  <?php
  require_once "config.php";
  $pdo->exec('SET NAMES utf8');
  $sth = $pdo->prepare("SELECT * FROM Adresses INNER JOIN Clients ON Adresses.id_adresse = Clients.adresse_livraison");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
  $customerName = "prenom";
  $customerSurname = "nom";
  $idCustomer = "id_client";
  foreach ($result as $data) {
   print_r('<option value = "'.$data[$idCustomer].'">'.$data[$customerName].' '.$data[$customerSurname].'</option>');
   $valueNumber =+1;
  }
  //Close SQL connection
  $pdo->connection = null;
  ?>
</select>
