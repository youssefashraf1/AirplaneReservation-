<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
       
    ?>
    
</head>
<body>
    <?php
    $successMessage = "";
        if(isset($_GET['from'])==true && $_GET['from']!='' && isset($_GET['companyId']) && $_GET['companyId'] !== ''){
            $flightId=$_GET['from'];
            $companyId=$_GET['companyId'];
            var_dump($flightId);
            $r=$con->query("SELECT fees FROM flight where id=$flightId");
            $row=$r->fetch_array(MYSQLI_ASSOC);
             $fees=$row['fees'];
             var_dump($fees);
            $r2 = $con->query("UPDATE  passenger SET account$=account$ +" . $row['fees']." WHERE email IN (SELECT user_email FROM passenger_flight WHERE flight_id = $flightId AND is_paid = true)");
            if ($r2 === false) {
                echo "Failed to update passenger balances: " . $con->error;
                exit();
            }
            
            $r3 = $con->prepare("UPDATE company SET account$ = account$ - (SELECT SUM(fees) FROM passenger_flight WHERE flight_id = ? ) WHERE id = ?");
            $r3->bind_param("dd", $flightId, $companyId);
            $r3->execute();
            
            if ($r3 === false) {
                echo "Failed to update company balance: " . $con->error;
                exit();
            }

            $deleteFlight = $con->query("DELETE FROM flight WHERE id = $flightId");
            if ($deleteFlight === false) {
                echo "Failed to delete flight from the flight table: " . $con->error;
                exit();
            }
            $deletePassengerFlight = $con->query("DELETE FROM passenger_flight WHERE flight_id = $flightId");

            if ($deletePassengerFlight === false) {
                echo "Failed to delete passengerflight records: " . $con->error;
                exit();
            }
             if($r2==true && $r3==true && $deleteFlight==true && $deletePassengerFlight==true ){
                $successMessage = "COMPANY and PASSENGER Balance are Updated successfully, and the flight is removed from Both Tables";
            }
            if (!empty($successMessage)) {
                header("Location: index.php?successMessage=" . urlencode($successMessage));
                exit();
            }
            
        }
        
    ?>
</body>
</html>