<?php

session_start();

include "ceksesi.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="ex-css/style.css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  .login{
  margin-bottom: 30px;
  width: 100%;
  padding: 30px;
  border-bottom: 1px solid #fff;
  color: #1BDD96;
}

.form{
  background: rgba(0, 0, 0, 0.3);
  width: 400px;
  text-align: center;
  position: relative;
  box-shadow: 2px white;
  border-radius: 10px;
}

.form-label{
  position: absolute;
  color: #fff;
  top: 25%;
  left: 55px;
  transition: 0.4s;
}

.fas{
  position: absolute;
  color: #fff;
  font-size: 20px;
  top: 29%;
  left: 32px;
  transition: 0.4s;
}

.form-control-sm{
  width: 90%;
  background: rgba(0, 0, 0, 0);
  outline: none;
  border: none;
  height: 40px;
  padding: 0 0 0 28px;
  border-bottom: 2px solid #fff ;
  color: #fff;
  transition: 0.4s;
}

.mb-3 input:focus ~ label,
.mb-3 input:valid ~ label {
  top: -5px;

}

.mb-3 input:focus ~ .fas,
.mb-3 input:valid ~ .fas {
  color: #FFB900;

}

.mb-3 input:focus,
.mb-3 input:valid{
  border-bottom: 2px solid #FFB900;
}

.btn:focus{
  box-shadow: 1px #48CF00;
}


@keyframes bg-login{
    0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

  </style>
</head>
<body style="display: flex; height: 100vh; justify-content: center; align-items: center; background-image: linear-gradient(45deg,rgba(81, 238, 88, 0.8), rgba(81, 238, 219, 0.8),rgba(81, 161, 238, 0.8)); background-size: 400%;
  animation: bg-login 8s ease infinite;">
    <form action="proses_login.php" method="post" class="form">
      <h3 class="login"><img src="fotoku/paty.png" width="200"></h3>
      <div class="mb-3" style="padding: 10px; position: relative;">
        <input type="text" class="form-control-sm" id="exampleInputEmail1" name="user" required>
        <i class="fas fa-user"></i>
        <label for="exampleInputEmail1" class="form-label">Username</label>
      </div>
      <div class="mb-3" style="padding: 10px; position: relative;">
        <input type="password" class="form-control-sm" id="exampleInputPassword1" name="pass" required>
        <i class="fas fa-lock"></i>
        <label for="exampleInputPassword1" class="form-label">Password</label>
        
      </div>
      <button type="submit" class="btn btn-success mb-4" style="width: 80%;">Login</button>
      <div class="copyright">
        <p style="color: #fff; font-size: 14px;">Copyright &copy; 2022 Prasada Arif Nurudin</p>
      </div>
    </form>
</body>
</html>