<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

$sth = $pdo->prepare('SELECT * FROM Commentaires WHERE id_commentaire LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultReviews1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

  $commId = "id_commentaire";
  $commCustomer = "client";
  $commArt = "article";
  $commCom = "commentaire";
  $commNote = "note";
  $commDate = "date_creation";
  $commVisible = "visible";

  foreach ($resultReviews1 as $key) {
    $id  = $key[$commId];
    $customer = $key[$commCustomer];
    $article = $key[$commArt];
    $comm = $key[$commCom];
    $note = $key[$commNote];
    $visible = $key[$commVisible];
  }

  $dateTmp = date_create($data[$commDate]);
  $tmpDateFormat = date_format($dateTmp, 'd.m.Y - H:i');

  $rAllNotes = array();
  foreach ($resultReviews1 as $key) {
  $rNumberStars = $key[$commNote];
  array_push($rAllNotes, $rNumberStars);
  }

  if (count($rAllNotes) == 0) {
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
      $rActualStars = str_repeat($rAStarsEmptyVar, 5);
  } else {
    $rAverageStars = round(array_sum($rAllNotes)/count($rAllNotes) * 2) / 2;
    if (strpos( $rAverageStars, '.' ) === false) {
      $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
      $emptyStars = 5 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);

      $rActualStars = $rActualStarsTemp. $rActualStarsEmpty;
    } else {
    $rAverageStars = $rAverageStars - 0.5;
      $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
      $rAStarsMiddleVar = '<img src="img/star-half-empty.svg" style="width: 22px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';

      $emptyStars = 4 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);
      $rActualStars = $rActualStarsTemp. $rAStarsMiddleVar. $rActualStarsEmpty;
    }
  }

  $orderArray = array('id' => $id, 'customer' => $customer, 'article' => $article, 'comm' => $comm, 'note' => $rActualStars, 'visible' => $visible, 'date' => $tmpDateFormat);
  echo json_encode($orderArray);
}
?>
