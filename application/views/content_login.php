<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Posyandu Desa Lokgabang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/styleLogin.css"> 
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/posyandu.png">
  <style type="text/css">
  
  body {
  background-image: url('assets/kesehatan.jpg');
  background-repeat: no-repeat;
  background-size: cover;
	position: static;
	
  }
</style>
</head>
<body style="background-color: #666666;">
<h2 style="text-align: center; text-transform: uppercase; -webkit-text-stroke: 1px black; margin-top340px; margin-bottom: -70px; color: orange; font-family: sans-serif;">
APLIKASI PENGELOLAAN DATA POS PELAYANAN TERPADU DAN SMS GATEWAY JADWAL IMUNISASI <br> PADA DESA LOKGABANG BERBASIS WEB
</h2>

  <div id="card">

    <div id="card-content">
		<div>
		<center><img src="<?php echo base_url('assets/posyandu.png')?>" alt="" width="40%" style="margin-top:0px; float:top;"></center>
		</div>
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="<?php echo site_url('login')?>" class="form">
        <label for="username" style="padding-top:10">
            Username
          </label>
        <input id="username" class="form-content" type="text" name="username" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:30px">Password
          </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <!-- <a href="#">
          <legend id="forgot-pass">Forgot password?</legend>
        </a> -->
        <input id="submit-btn" style="color: black;" type="submit" name="submit" value="LOGIN" />
        <!-- <a href="#" id="signup">Don't have account yet?</a> -->
      </form>
    </div>
  </div>
</body>

</html>
