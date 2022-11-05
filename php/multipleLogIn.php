<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
  </head>

  <style>
    .sn {
      text-align: center;
      padding: 75px;
      margin-top: 45px;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn1 {
      font-size: 30px;
      text-transform: uppercase;
      text-align: center;
      background-color: brown;
    }

    .btn2 {
      font-size: 30px;
      text-transform: uppercase;
      text-align: center;
      background-color: rgb(153, 117, 0);
    }
  </style>

  <body>
    <div>
      <button class="m">
        <a href="homePage.php" style="text-align: left; text-decoration: none"
          >Home</a
        >
      </button>
    </div>
    <div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px">
      <div class="sn">
        <div class="clearfix1">
          <form action="logInForPatient.php" method="POST">
            <button type="submit" class="btn1">Patient Log In</button>
          </form>
        </div>

        <div class="clearfix2">
          <form action="admin-login.php" method="POST">
            <button type="submit" class="btn2">Admin Log In</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
