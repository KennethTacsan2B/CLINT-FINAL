<!DOCTYPE html>
<!-- divinectorweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>

    <div class="banner">
      <div class="content">
        <form action="info.php" method="post" id="form">
          <h1>Registration Details</h1>
        

          <div class="form-input fullname">
            <span>Full Name:</span>
            <div class="inputs">
              <input
                type="text"
                name="firstName"
                placeholder="First Name"
                id="input"
                class="input-name"
              />
              <input
                type="text"
                name="lastName"
                placeholder="Last Name"
                id="input"
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
              <input
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                id="input"
              />
            </div>
          </div>

          <div class="form-input email">
            <span>Email Address:</span>
            <div class="inputs">
              <input
                class="input-email"
                type="email"
                name="email"
                placeholder="Tacsan@gmail.com"
                id="input"
                class="add"
              />
              <input
                type="email"
                name="confirm_email"
                placeholder="Confirm Email"
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