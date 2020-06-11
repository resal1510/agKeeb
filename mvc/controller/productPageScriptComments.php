<?php
$nameS = "pseudo";
  foreach ($resultForReviews as $key) {
    $rNumberStars = $key[$stars];
    $rComment = $key[$comment];
    $rDate = date("d.m.Y", strtotime($key[$date]));
    $rVisible = $key[$isVisible];
    $rName = $key[$nameS];

    if ($rVisible == "true") {
      switch ($rNumberStars) {
        case '1':
          $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
          break;
          case '2':
          $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
            break;
            case '3':
            $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
              break;
              case '4':
              $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
                break;
                case '5':
                $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;">';
                  break;
                }

      $reviewHTML = '<div class="border rounded-0 review-item" style="margin-bottom: 30px;padding: 20px;">
        <div class="rating" style="margin-bottom: 10px;">'.$rStars.'</div>
          <h4 style="font-size: 19px;"></h4><span class="text-muted">'.$rName.', le '.$rDate.'</span>
          <p style="margin-top: 12px;font-size: 14px;">'.$rComment.'</p>
      </div>';
      echo $reviewHTML;
      ++$rCount;
      array_push($rAllNotes, $rNumberStars);
    }
  }
  if ($rCount == 0) {
    echo "Il n'y a pas encore de commentaires disponibles pour cet article.";
  }
 ?>
