<?php
session_start();
    if(isset($_SESSION['username'])){
      header("Location:home.php?url=utama");
    }else{
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kost Management System</title>
    <link rel="stylesheet" type="text/css" href="/Semantic/semantic.css">
    <script src="/Semantic/semantic.js"></script>
    <style media="screen">
      body{
        background-image: url("/KMS/Res/Index.jpg");
        background-position: center;
      }
    </style>
  </head>
  <body>
    <div class="">
      <div class="ui two column middle aligned very relaxed stackable centered grid" style="weight:600px;height:600px;">
          <div class="five wide column">
          <form action="login.php" method="post">
            <div class="ui form">
              <div class="field">
                <label>Username</label>
                <div class="ui left icon input">
                  <input placeholder="Your Username" type="text" name="username">
                  <i class="user icon"></i>
                </div>
              </div>
              <div class="field">
                <label>Password</label>
                <div class="ui left icon input">
                  <input type="password" name="password" placeholder="Your Password">
                  <i class="lock icon"></i>
                </div>
              </div>
              <button class="ui green button" type="submit" name="submit">Sign In</button>
              <p>
                <a href="register.html">Daftarkan Kost anda Sekarang</a>
              </p>
            </form>
            </div>
          </div>
          <div class="ui vertical divider">
            Atau
          </div>
          <div class="center aligned five wide column">
            <div class="ui big green labeled icon button" onclick="location.href='cari.php'">
              <i class="signup icon"></i>
              Cari Kost
            </div>
          </div>
        </div>
    </div>
    </body>
</html>
<?php } ?>
