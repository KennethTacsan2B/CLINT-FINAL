<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="background.css">
    <link rel="stylesheet" href="infos.css">
</head>
<body>

   <div class="container">



        <?php

            
if (empty($_POST["firstName"])){
    echo "Full name is required.";
  }
  // if (! filter_var($_POST(["email" and "confirm_email"], FILTER_VALIDATE_EMAIL))){
  //   echo "Valid is required.";
  // }
  if (strlen($_POST["password"]) < 8) {
    echo "Password must be at least 8 characters.";
  }

  if (! preg_match("/[a-z]/i", $_POST["password"])){
    echo "Password must contain at least 1 letter.";
  }
  if (! preg_match("/[0-9]/i", $_POST["password"])){
    echo "Password must contain a number.";
  }
  if ($_POST["password"] !== $_POST["confirm_password"]){
    echo "Password must match.";
  }
  if ($_POST["email"] !== $_POST["confirm_email"]){
    echo "Email must match.";
  }

 $mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (first_name, last_name, email, password_hash)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init(); 
 $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

if (! $stmt->prepare($sql)){
    die ("SQL error" . $mysqli->error);
}

$stmt->bind_param("ssss",
                   $_POST["firstName"],
                   $_POST["lastName"],
                   $_POST["email"],
                  $password_hash);

if ($stmt->execute()){
    header("Location: success.php");
    exit;
}
else {
    if($mysqli->errno === 1062){
        die("email already exist");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
}   
        ?>
        </div>
</div>

</body>
</html>