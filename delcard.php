<?php
require_once "dbconnect.php";
$si=$_GET['si'];
$q="delete from upload_details where si_no='$si' ";
$res=$link->query($q);
?>

<script>window.location="viewadmin.php";</script>