<?php
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelCommentReviewSQL.php';

$rAllNotes = array();
foreach ($resultForReviews as $key) {
$rNumberStars = $key[$stars];
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
?>
