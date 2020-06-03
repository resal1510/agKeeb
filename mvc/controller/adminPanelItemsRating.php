<?php
$sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE article LIKE :wantedId");
$sth2->bindParam(':wantedId', $idItemG, PDO::PARAM_STR);
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
?>
