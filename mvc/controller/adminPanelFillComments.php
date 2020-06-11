<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelFillCommentsSQL.php';

  $commId = "id_commentaire";
  $commCustomer = "client";
  $commArt = "article";
  $commPseudo = "pseudo";
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
    $pseudo = $key[$commPseudo];
  }

  $dateTmp = date_create($data[$commDate]);
  $tmpDateFormat = date_format($dateTmp, 'd.m.Y - H:i');

  $rAllNotes = array();
  foreach ($resultReviews1 as $key) {
  $rNumberStars = $key[$commNote];
  array_push($rAllNotes, $rNumberStars);
  }

  if (count($rAllNotes) == 0) {
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 19px;">';
      $rActualStars = str_repeat($rAStarsEmptyVar, 5);
  } else {
    $rAverageStars = round(array_sum($rAllNotes)/count($rAllNotes) * 2) / 2;
    if (strpos( $rAverageStars, '.' ) === false) {
      $rAStarsVar = '<img src="img/star.svg" style="width: 19px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 19px;">';
      $emptyStars = 5 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);

      $rActualStars = $rActualStarsTemp. $rActualStarsEmpty;
    } else {
    $rAverageStars = $rAverageStars - 0.5;
      $rAStarsVar = '<img src="img/star.svg" style="width: 19px;">';
      $rAStarsMiddleVar = '<img src="img/star-half-empty.svg" style="width: 19px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 19px;">';

      $emptyStars = 4 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);
      $rActualStars = $rActualStarsTemp. $rAStarsMiddleVar. $rActualStarsEmpty;
    }
  }

  $orderArray = array('id' => $id, 'customer' => $customer, 'article' => $article, 'comm' => $comm, 'note' => $rActualStars, 'visible' => $visible, 'date' => $tmpDateFormat, 'pseudo' => $pseudo);
  echo json_encode($orderArray);
}
?>
