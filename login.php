<?php
$isInvalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
           $mysqli->real_escape_string($_POST["email"]));

           $result = $mysqli->query($sql);

           $user = $result->fetch_assoc();
           
           if ($user){
            if (password_verify($_POST["password"], $user["password_hash"])){
              session_start();
              session_regenerate_id();
              
              $_SESSION["user_id"] = $user["id"];

              header("Location: index.php");
              exit;
            }
           }
           $isInvalid = true;
}

?>
<!DOCTYPE html>
<!-- divinectorweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap"
      rel="stylesheet"
    />
     <link rel="stylesheet" href="login.css" />

  </head>
  <body>
    <div class="banner">
      <div class="content">
        <form  method="post" id="form" >
            <?php
            if ($isInvalid):  ?>
                <p class="login-error">Invalid Login</p>
                <?php endif; ?>
          <h1>Log In</h1>
          <hr />

          <div class="form-input email">
            <span>Email:</span>
            <div class="inputs">
              <input
                class="input-email"
                type="email"
                name="email"
                placeholder="Tacsan@gmail.com"
                id="input"
                class="add"
                value="<?=htmlspecialchars($_POST["email"] ??"")?>"
              />
            </div>
          </div>
          

          <div class="form-input phoneNumber">
            <span>Password:</span>
            <div class="inputs">
              <input
                class="input-number"
                type="password"
                name="password"
                placeholder="Password"
                id="input"
              />
            </div>
          </div>
          <div class="btn">
            <button type="submit" id="submit-btn">Submit</button>
          </div>
          
        </form>
      </div>
    </div>
    <script>
      const form = document.getElementById("form");
      const inputField1 = document.getElementById("input");
      const submitButton = document.getElementById("submit-btn");

      form.addEventListener("submit", function (event) {
        if (!inputField1.value) {
          alert("Please fill in all the missing fields before submitting.");
          event.preventDefault();
        }
      });
    </script>
  </body>
</html>