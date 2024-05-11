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
            // Redirect to the login page if not logged in as a passenger
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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 16px;
    border-radius: 4px;
}

    </style>
   
</head>
<body>

    
   
    
 

   
     <!-- Display additional information about the company -->
    <?php
    $stmtCompanyInfo = $con->prepare("SELECT * FROM company WHERE email = ?");
    $stmtCompanyInfo->bind_param('s', $_SESSION['user_email']);
    $stmtCompanyInfo->execute();
    $resultCompanyInfo = $stmtCompanyInfo->get_result();

    if ($resultCompanyInfo->num_rows > 0) {
        $row = $resultCompanyInfo->fetch_assoc();
    } else {

    }

    if(isset($_POST['submit'])) {
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];
        $newPhone = $_POST['telefone'];
        $newUserName =$_POST['user_name'];
        $newAcount= $_POST['account$'];
        $newAddress=$_POST['address'];
        $newLocation=$_POST['location'];
        $newBio=$_POST['bio'];
        $newLogo = $_POST['logo'];
        $updateQuery = "UPDATE company SET name=?, user_name=?, email=?, password=?, telefone=?, bio=?, address=?,
                      location=?, logo=?, account$=? WHERE email=?";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->bind_param('sssssssssss', $newName, $newUserName, $newEmail, $newPassword, $newPhone, $newBio,
    $newAddress, $newLocation, $newLogo, $newAcount, $_SESSION['user_email']);

        $updateStmt->execute();
   
   
        header("Location: index.php");
        exit();
    }

     

    //   ';
    ?>

        <form method="post" action="">
            <label for="phone">logo:</label>
             <input type="file" id="photo" name="logo" value="<?= $row['logo'] ?>" required>
            
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>
        <label for="name">user name:</label>
        <input type="text" id="name" name="user_name" value="<?= $row['user_name'] ?>" required>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $row['email'] ?>" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="telefone" value="<?= $row['telefone'] ?>" required>

        <label for="phone">password:</label>
        <input type="text" id="password" name="password" value="<?= $row['password'] ?>" required>

        <label for="phone">balance:</label>
        <input type="number" id="account$" name="account$" value="<?= $row['account$'] ?>" required>

        <label for="phone">address:</label>
        <input type="text" id="address" name="address" value="<?= $row['address'] ?>" required>

        <label for="phone">location:</label>
        <input type="text" id="location" name="location" value="<?= $row['location'] ?>" required>

        <label for="bio">Bio:</label>
      <textarea id="bio" name="bio" rows="5" value="<?= $row['bio'] ?>" required></textarea>
        <button type="submit" name="submit">Update</button>
        <a href="./index.php">back</a>
    </form>

</body>
</html>