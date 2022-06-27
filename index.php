<?php
require_once "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $ti = $_POST['search'];
  $q = "select * from upload_details where title LIKE '%$ti%' order by si_no DESC ";
  $res = $link->query($q);
} else {
  $q = "select * from upload_details order by si_no DESC";
  $res = $link->query($q);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  
  <meta charset="utf-8">
  <title>Responsive Navbar | CodingNepal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>

<body style="background-color: #644bff;">

  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo" href="index.php">DesignX</label>

    <ul style="z-index: 999;">
      <li><a class="active" href="index.php"> <i class="bi bi-house"></i> Home</a></li>
      <li><a href="#"> <i class="bi bi-film"></i> Movies Channel</a></li>
      <li><a href="#"> <i class="bi bi-person-rolodex"></i> Contact</a></li>
      <li><a href="adminlogin.php"> <i class="bi bi-box-arrow-in-right"></i> Admin</a></li>
    </ul>
  </nav>
  <section>
    <div class="container">
      <div class="row mt-4">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="p-3">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control form-control-lg rounded-pill border-info border border-dark" placeholder="Search..." autocomplete="off" required>
            <div class="input-group-append">
            <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-pill border border-dark">
            </div>
          </div>
          
          <div class="col-md-5" style="position: relative;margin-top: -24px;margin-right: -80%;">
            <datalist class="list-group" id="show-list">
          </div>
        </form>

        <!-- <div class="col-md-5" style="position: relative;margin-top: -50px;margin-right: 220px;"> -->


      </div>
    </div>
    </div>
    </div>


    <div class="container mt-5">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <div class="row">
          <?php foreach ($res as $r) { ?>
            <div class="col-sm-4 py-3 py-sm-0">
              <div class="card shadow" style="position: background;">
                <div class="inner">
                  <img class="card-img-top" src="<?php echo $r['file'] ?>" alt="Card image cap" width="300px" height="240px">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $r['title'] ?></h5>
                  <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="<?php echo $r['link'] ?>" class="btn btn-primary btn11"><i class="bi bi-play-fill"></i> Play</a>
                  <a href="<?php echo $r['link'] ?>" class="btn btn-primary btn22"> <i class="bi bi-arrow-down-circle"></i> Download</a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </form>
    </div>
  </section>
  <script>
    $(document).ready(function() {
      // Send Search Text to the server
      $("#search").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "action.php",
            method: "post",
            data: {
              query: searchText,
            },
            success: function(response) {
              $("#show-list").html(response);
            },
          });
        } else {
          $("#show-list").html("");
        }
      });
      // Set searched text in input field on click of search button
      $(document).on("click", "a", function() {
        $("#search").val($(this).text());
        $("#show-list").html("");
      });
    });
  </script>
</body>

</html>
<?php

?>