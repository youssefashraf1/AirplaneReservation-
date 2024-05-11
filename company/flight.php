<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once('../connection.php');
        session_start();
        if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'company') {
            // Redirect to the login page if not logged in as a company
            header('Location: ../index.php');
            exit();
        }
        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();

            // Redirect to the login page
            header('Location: ../index.php');
            exit();
        }
        $userEmail = $_SESSION['user_email'];
        $userId=$_SESSION['user_id'];
        $p = $con->query("SELECT * FROM company WHERE email = '".$userEmail."'");

        $row=$p->fetch_array(MYSQLI_ASSOC);
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
        font-size: 25px;
        text-decoration: none;
        color: black;
        font-family: "Alegreya", serif;
        padding-left:80px ;
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
        padding: 8px 8px;
        border-radius: 10px;
        font-family: "Alegreya Sans", sans-serif;
        margin-left: 95px;

      }
      .btn2 {
        color: white;
        font-size: 18px;
        padding: 8px 8px;
        border-radius: 10px;
        font-family: "Alegreya Sans", sans-serif;
        border: white solid 2px;
        background-color: transparent;
        margin-left: 95px;
      }

      .contain {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 60px 0px;
      }
      .child {
        height: 300px;
        width: 350px;
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
      
    
      <div class="contain">

      <?php
       if (isset($_GET['from']) && $_GET['from'] !== '' && isset($_GET['companyId']) && $_GET['companyId'] !== '') {
        $flightId = $_GET['from'];
        $companyId=$_GET['companyId'];
        $query = "SELECT * FROM flight WHERE id = $flightId";
        $result = $con->query($query);
    
        if ($result === false) {
            echo "Error executing query: " . $con->error;
        } else {
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                echo '
        <form method="post" action="flight.php?edit='.$_GET['from'].' & companyId='.$_GET['companyId'].'">
        <div class="child">
        <h2 class="flightn">
        ' . $row['name'] . '
        </h2>
        <p class="info">iternary: ' . $row['Itinerary'] . '</p>
        <p class="info">fees :' . $row['fees'] . '</p>
        <p class="info">Max Passenger:' . $row['passengers_num'] . '</p>
        <p class="info">Rejestered Passenger:' . $row['registered_num'] . '</p>
        <p class="info">Start at:' . $row['start_at'] . '</p>
        <p class="info">Ends at: '.$row['end_at'].'</p>
        <p class="info">From: '.$row['from'].'</p>
        <p class="info">To: '.$row['to'].'</p>
        <input class="btn1"  type="submit"  value="Set Completed">
        </br>
        <a class="tt1" href="cancel.php?from='.$_GET['from'].' & companyId='.$_GET['companyId'].'">CANCEL FLIGHT..?</a>
        </div>
        

        </form>
        ';
                } else {
                
                    echo "No rows found for flight ID: $flightId";
                }
            }
        }
        ?>
          
            <?php
            if (isset($_GET['edit']) && $_GET['edit'] !== '' && isset($_GET['companyId']) && $_GET['companyId'] !== '') {
                $flightId = $_GET['edit'];
                $companyId=$_GET['companyId'];

            $completed = true;
            // var_dump($flightId);
            // var_dump($completed);

            $r=$con->query("UPDATE flight SET is_complete=$completed WHERE id=" . $flightId."");       
            if ($r === false ) {
                echo "Failed to update flight: " . $con->error;
                exit();
            }else{
                echo "flight is updated successfully";
            }
        }    
            ?>





      
        
      </div>
    </div>




         
        
</body>
</html>