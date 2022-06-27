<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
    require_once "dbconnect.php";
    if (isset($_GET['search'])) {

        $ti = $_GET['search'];
        $q = "select * from upload_details where title LIKE '%$ti%' order by si_no DESC ";
        $res = $link->query($q);
    } else {
        $q = "select * from upload_details order by si_no DESC";
        $res = $link->query($q);
    }
?>
    <!DOCTYPE html>
    <!-- Created By CodingNepal - www.codingnepalweb.com -->
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body style="background-color: #644bff;">
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">DesignX</label>
            <ul style="z-index: 999;">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="insert.php">Insert</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
            </ul>
        </nav>

        <section>
        <div class="card-body" style="position: center;">
      <div class="row">
        <div class="col-md-6">
          <form action="" method="GET">
            <div class="input-group mb-3">

              <input type="text" value="<?php if(isset($_GET['search'])) {echo $_GET['search']; } ?>" name="search" class="form-control" placeholder="Search Here" >
              <button class="btn btn-info" type="submit"> <i class="bi bi-search"></i> Search</button>
            </div>
          </form>
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
                                        <a href="<?php echo $r['link'] ?>" class="btn btn-primary">play</a>
                                        <a href="delcard.php?si=<?php echo $r['si_no'] ?>" class="btn btn-danger">delete</a>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </form>
            </div>
        </section>

    </body>

    </html>
<?php

} else {
    header("Location:index.php");
}
?>