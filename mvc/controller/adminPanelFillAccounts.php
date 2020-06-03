<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

$sth = $pdo->prepare('SELECT * FROM Clients WHERE id_client LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultCustomer1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

  $customerID = "id_client";
  $customerMail = "mail";
  $customerIp = "derniere_ip";
  $customerAdmin = "admin";
  $customerActive = "active";

  foreach ($resultCustomer1 as $key) {
    $id  = $key[$customerID];
    $mail = $key[$customerMail];
    $pwd = $key[$customerPasswd];
    $ip = $key[$customerIp];
    $admin = $key[$customerAdmin];
    $active = $key[$customerActive];
  }

  $customerArray = array('id' => $id, 'mail' => $mail, 'ip' => $ip, 'admin' => $admin, 'active' => $active);
  echo json_encode($customerArray);
}
?>
