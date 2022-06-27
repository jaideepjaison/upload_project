<!DOCTYPE html>
<head></head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>

    </label>
<div class="sidebar">
    <header>Demo</header>
    <ul>
        <li><a href="insert.php">Admin <i class="bi bi-box-arrow-in-right"></i></a></li>
        <li><a href="">Contact <i class="bi bi-person-lines-fill"></i></a></li>
    </ul>
</div>
<section></section>
</body>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
   
    *{
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
    }
    .sidebar{
        position: fixed;
        left: -250px;
        width: 250px;
        height: 100%;
        background: #042331;
        transition: all .5s ease;
    }
    .sidebar header{
        font-size: 22px;
        color: white;
        text-align: center;
        background: #063146;
        user-select: none;
        line-height: 70px;
        
    }
    .sidebar ul a{
        display: block;
        height: 100%;
        width: 100%;
        line-height: 65px;
        font-size: 20px;
        color: white;
        box-sizing: border-box;
        padding-left: 40px;
        border-top: 1px solid rgba(255, 255, 255,.1);
        border-bottom: 1px solid black;
        transition: .4s;
    }
    ul li:hover a{
        padding-left: 50px;
    }
    .sidebar ul a i{
        margin-left: 16px;
    }
    #check{
        display: none;
    }
    label #btn, label #cancel
    {
        position: absolute;
        cursor: pointer;
        background: #042331;
        border-radius: 3px;
    }
    label #btn 
    {
        left :40px;
        top: 25px;
        font-size: 35px;
        color: white;
        padding: 6px 12px;
    }
    label #cancel 
    {
      z-index: 1111;
      left: -195px;
      top: 17px;
      font-size: 30px;
      color: #0a5275;
      padding: 4px 9px; 
      transition: all .5s ease; 
    }
    #check:checked ~ .sidebar{
        left: 0;
    }
    #check:checked ~ label #btn {
        left: 250px;
        opacity: 0;
        pointer-events: none;
    }
    #check:checked ~ label #cancel {
        left: 195px;
         }
    section{
        background: url(android.jpg) no-repeat;
        background-position: center;
        background-size: cover;
        background-size: 100vh;
    }
</style>