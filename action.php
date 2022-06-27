<?php
  require_once 'dbconnect.php';

  if (isset($_POST['query'])) {
    echo $inpText = $_POST['query'];
    // $sql = 'SELECT country_name FROM countries WHERE country_name LIKE :country';
    // $stmt = $conn->prepare($sql);
    $sql = "select * from upload_details where title LIKE '%$inpText%' order by si_no DESC ";
  $stmt = $link->query($sql);
    

    if ($stmt) {
      foreach ($stmt as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['title'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>