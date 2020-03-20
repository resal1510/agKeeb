<?php
$sql = "SELECT id_client, mail, derniere_ip FROM Clients WHERE remember_cookie LIKE :cookieHash";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":cookieHash", $keepCookie, PDO::PARAM_STR);
$stmt->execute();
$rRememberMe = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>
