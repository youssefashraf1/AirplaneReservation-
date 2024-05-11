<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    require_once('../connection.php');
    session_start();


    $userEmail = $_SESSION['user_email'];
    $userId = $_SESSION['user_id'];
    if (
        isset($_POST['name'])  &&
        isset($_POST['iternary']) &&
        isset($_POST['fees'])  &&
        isset($_POST['startTime'])  &&
        isset($_POST['endTime'])  &&
        isset($_POST['maxPassenger'])  &&
        isset($_POST['from']) &&
        isset($_POST['to'])

    ) {
        $name = $_POST['name'];
        $iternary = $_POST['iternary'];
        $fees = $_POST['fees'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $maxPassenger = $_POST['maxPassenger'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $isCompleted=false;
        $cnt=0;

        if (empty($errors)) {
            $stmtAddFlight = $con->prepare("INSERT INTO flight (name, Itinerary, fees, start_at, end_at,
            is_complete, registered_num, passengers_num, company_email, `to`, `from`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


            $stmtAddFlight->bind_param('sssssssssss', $name, $iternary, $fees, $startTime,
                $endTime, $isCompleted,$cnt , $maxPassenger,$userEmail,$from,$to);
            $stmtAddFlight->execute();
            $stmtAddFlight->close();
        }
        header("Location: index.php");
    }
    ?>
    <script>
        function validateCities() {
            var fromCity = document.getElementById("from").value;
            var toCity = document.getElementById("to").value;

            if (fromCity === toCity) {
                alert("From and To cities cannot be the same. Please choose again.");
                return false;
            }

            return true;
        }
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }





    </style>
</head>
<body>
<form method="post" >
    <label for="name">Name:<input type="text" name="name" required></label>
    <label for="iternary">iternary:<input type="text" name="iternary" required></label>
    <label for="fees">fees:<input type="number" name="fees" required></label>
    <label for="maxPassenger">maxPassenger:<input type="number" name="maxPassenger" required></label>
    <label for="StartTime">StartTime:<input type="datetime-local" name="startTime" required></label>
    <label for="EndTime">EndTime:<input type="datetime-local" name="endTime" required></label>
    <label for="from">from: <input type="text" id="from" name="from"></label>
    <label for="to">to: <input type="text" id="to" name="to"></label>

    <input type="submit" name="Submit" value="Submit">

</form>
</body>
</html>