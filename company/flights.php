<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once('../connection.php');
    session_start();
    $userEmail = $_SESSION['user_email'];
    $userId = $_SESSION['user_id'];
    $p = $con->query("SELECT * FROM flight WHERE company_email = '".$userEmail."'");
    $q = $con->query("SELECT * FROM company WHERE email = '".$userEmail."'");

        $row=$q->fetch_array(MYSQLI_ASSOC);

   

    if (isset($_GET['successMessage'])) {
        echo '<script>alert("' . htmlspecialchars($_GET['successMessage']) . '");</script>';
    }


    ?>
      <style>
      * {
        padding: 0;
        margin: 0;
      }

      .clr {
        clear: both;
      }
      .navbar {
        background-color: #9f8b5d;
        display: flex;
        align-items: center;
        padding: 10px;
      }

      .img {
        mix-blend-mode: multiply;
        width: 70px;
        height: auto;
        margin-right: 50px;
      }
      .links {
        list-style: none;

        margin: 0;
        padding: 0;
        display: flex;
        right: 10px;
        margin-left: auto;
      }
      .link {
        color: white;

        text-decoration: none;
        font-size: 22px;
        display: block;
        padding: 10px 15px;
        position: relative;
        font-family: "Alegreya", serif;
      }
      .link:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: black;
        transform: scale(0);
        transform-origin: left;
        transition: all 0.5s;
      }
      .link:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: black;
        transform: scale(0);
        transform-origin: right;
        transition: all 0.5s;
      }
      .link:hover {
        color: black;
      }
      .link:hover:before,
      .link:hover:after {
        transform: scaleX(1);
      }
      .tt1 {
        font-size: 30px;
        text-decoration: none;
        color: black;
        font-family: "Alegreya", serif;
      }
      .intro {
        margin: auto;
        text-align: center;
        padding-top: 13%;
        padding-bottom: 28%;
      }
      h1 {
        color: white;

        margin-bottom: 40px;
        margin-top: 20px;
        font-family: "Alegreya", serif;
        font-size: 70px;
      }

      p {
        color: white;

        font-size: 20px;
        font-family: "Alegreya Sans", sans-serif;
      }

      .buttons {
        margin-top: 2.5%;
      }
      .btn1 {
        color: white;
        font-size: 18px;
        background-color: #8e7754;
        border: none;
        padding: 16px 18px;
        border-radius: 10px;
        font-family: "Alegreya Sans", sans-serif;
      }
      .btn2 {
        color: white;
        font-size: 18px;
        padding: 16px 18px;
        border-radius: 10px;
        font-family: "Alegreya Sans", sans-serif;
        border: white solid 2px;
        background-color: transparent;
      }

      .contain {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 60px 0px;
      }
      .child {
        height: 250px;
        width: 300px;
        background-color: burlywood;
        margin: 15px;
        border-radius: 15px;
      }
      .flightn {
        margin: 20px auto;
        text-align: center;
      }
      .info {
        margin-left: 30px;
        color: black;
      }
      .diclration {
        height: 10vh;
        text-align: center;
      }
      .dic {
        color: black;
      }
      .tt1:hover{
        color: red;
      }
      
    </style>
</head>
<body>

<div class="main">
      <div class="navbar">
      <img class="img" src="../imeges/<?php echo $row['logo']; ?>" alt="company icon" />
        <P><?php echo $row['name']; ?></P>
        <ul class="links">
          <li><a href="flights.php" class="link">Flights</a></li>
          <li><a href="./comProfile.php" class="link">Profile</a></li>
          <li><a href="addFlight.php" class="link">Add Flight</a></li>
          <li><a href="message.php" class="link">message</a></li>
          <li>
            <form method="post">
              <button
                type="submit"
                name="logout"
                class="link"
                style="background: none; border: none"
              >
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
      <div class="diclration">
        <h1 class="dic">Our Flights</h1>
      </div>

      <div class="contain">

      <?php
 while($flights=$p->fetch_array(MYSQLI_ASSOC)){

    echo '
        <div class="child">
        <h2 class="flightn">
         <a  href="flight.php?from='.$flights['id'].' & companyId='.$flights['company_email'].'" class="tt1">'.$flights['name'].'</a>
        </h2>
        <p class="info">iternary: '.$flights['Itinerary'].'</p>
        <p class="info">fees :'.$flights['fees'].'</p>
        <p class="info">Start at:'.$flights['start_at'].'</p>
        <p class="info">Ends at: '.$flights['end_at'].'</p>
        <p class="info">From: '.$flights['from'].'</p>
        <p class="info">To: '.$flights['to'].'</p>
        </div>

        ';
}


?>







      
        
      </div>
    </div>


</body>
</html>