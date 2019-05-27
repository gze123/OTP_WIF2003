<?php
include_once("config.php");

$sql = "SELECT * FROM activity WHERE activity_id > 0";
$step = $pdo->prepare($sql);
$step->execute();
$step = $step->fetchAll();

// foreach ($step as $row) {
//   echo "<tr><td>$row[activity_id]</td><td>$row[activity_name]</td><td>$row[description]</td><td>$row[location]</td><td>$row[start_date]</td></tr>";
//   echo "<br>";
// }


echo "<br>2";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script>
    document.getElementsByTagName("html")[0].className += " js";
  </script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Timeline</title>
</head>

<body>
  <header class="cd-main-header text--center flex flex--column flex--center">
    <h1>Timeline</h1>
  </header>

  <section class="cd-timeline js-cd-timeline">
    <div class="container container--lg cd-timeline__container">

      <?php
      foreach ($step as $row) {
        //create block
        echo '<div class="cd-timeline__block">';

        echo '<div class="cd-timeline__img cd-timeline__img--picture">';
        echo '<img src="assets/img/cd-icon-picture.svg" alt="Picture" />';
        echo '</div>';

        echo '<div class="cd-timeline__content text-component">';
        echo "<h2>$row[activity_name]</h2>";
        echo '<p class="text--subtle">';
        echo "$row[description]";
        echo '</p>';

        echo '<div class="flex flex--space-between flex--center-y">';
        echo '<span class="cd-timeline__date">';
        echo "$row[start_date]";
        echo '</span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>

    </div>
  </section>
  <!-- cd-timeline -->
  <script src="assets/js/main.js"></script>
</body>

</html>