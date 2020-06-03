<?php
require_once "config.php";
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Commentaires");
$sth->execute();
$resultComments = $sth->fetchAll(\PDO::FETCH_ASSOC);

$fCommId = "id_commentaire";
$fCommCustomer = "client";
$fCommItem = "article";
$fCommNote = "note";
$fCommVisible = "visible";
$fCommDate = "date_creation";
$stars = "note";

foreach ($resultComments as $data) {

  $dateTmpCom = date_create($data[$fCommDate]);
  $tmpDateFormatCom = date_format($dateTmp, 'd.m.Y');

  $sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE id_commentaire LIKE :wantedId");
  $sth2->bindParam(':wantedId', $data[$fCommId], PDO::PARAM_STR);
  $sth2->execute();
  $resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC);

  $rAllNotes = array();
  foreach ($resultForReviews as $key) {
  $rNumberStars = $key[$stars];
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

  print_r('<div class="row justify-content-between Comment border-left border-right border-bottom p-1" style="font-size: 14px;" id="r'.$data[$fCommId].'">
    <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fCommId].'</span></div>
    <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center"><span>'.$data[$fCommItem].'</span></div>
    <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center">'.$rActualStars.'</div>
    <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fCommCustomer].'<br></span></div>
    <div class="col-3 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$tmpDateFormatCom.'</span></div>');

    switch ($data[$fCommVisible]) {
      case 'true':
        print_r('<div class="col-1 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fa fa-check" style="color: #52dc3c;"></i></div></div>');
        break;

      case 'false':
        print_r('<div class="col-1 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="far fa-times-circle" style="color: #e71d1d;"></i></div></div>');
        break;
    }
}
?>
