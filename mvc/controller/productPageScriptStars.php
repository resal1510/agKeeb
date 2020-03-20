<?php
foreach ($resultForReviews as $key) {
$rNumberStars = $key[$stars];
array_push($rAllNotes, $rNumberStars);
}
$rAverageStars = round(array_sum($rAllNotes)/count($rAllNotes) * 2) / 2;
if (strpos( $rAverageStars, '.' ) === false) {
  $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
  $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
  $emptyStars = 5 - $rAverageStars;

  $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
  $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);

  $rActualStars = $rActualStarsTemp. $rActualStarsEmpty;
  echo $rActualStars;
} else {
$rAverageStars = $rAverageStars - 0.5;
  $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
  $rAStarsMiddleVar = '<img src="img/star-half-empty.svg" style="width: 22px;">';
  $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';

  $emptyStars = 4 - $rAverageStars;

  $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
  $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);
  $rActualStars = $rActualStarsTemp. $rAStarsMiddleVar. $rActualStarsEmpty;
  echo $rActualStars;
}
?>
