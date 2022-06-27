<?php
session_start();
error_reporting(0);
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
    require_once "dbconnect.php";

?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$file1= $_POST["file"];

        $filename = $_FILES["file"]["name"];
        $temp = $_FILES['file']['tmp_name'];
        $folder = "images/" . $filename;
        move_uploaded_file($temp, $folder);
        $title1 = $_POST["title"];
        $link1 = $_POST["link"];

        $q4 = "insert into upload_details(file,title,link) values('$folder','$title1','$link1')";
        $res1 = $link->query(($q4));
        if ($res1) {
            $_SESSION['insert1']="sucess";
        } else {
            echo "no";
        }
    }
    ?>
    <!-- CSS only -->



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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">DesignX</label></a>
            
            <ul style="z-index: 999;">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="viewadmin.php">View Admin</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
            </ul>
        </nav>
        <br>
        <?php if (isset($_SESSION['insert1'])) 
        {
            
        ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <strong>Hey!</strong> successfully added.
            </div>
        <?php
            unset($_SESSION['insert1']);
        }
        ?>
        <section style="margin-left: 5%;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="col-8">
                    <label class="form-label mt-4 " for="customFile">Upload Image</label>
                    <input type="file" class="form-control" id="customFile" name="file" required>
                    <label class="form-label mt-4" for="customFile">Insert Title</label>
                    <input type="text" class="form-control" id="customFile" name="title" required>
                    <label class="form-label mt-4" for="customFile">Insert Link</label>
                    <input type="link" class="form-control" id="customFile" name="link" required>

                    <input type="submit" class="btn btn-info mt-4" id="customFile" name="submit" required>
                </div>
            </form>
        </section>

    </body>

    </html>

<?php
} else {
    header("Location:index.php");
}
?>