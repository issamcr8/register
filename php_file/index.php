<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <title>Document</title>

</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a style="color: #EF711D;" class="navbar-brand" href="#"><?php session_start();
                                                                  echo "welcome " . " " . $_SESSION["FULLNAME"]  ?></a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <li><a href="#">-----</a></li>
        <a class="navbar-brand" href="#">
          <form method='post'> <button style="background-color: #EF711D; border: none; color:aliceblue;" id='btn' type='submit' name='logout'> LOGOUT </button> </form>
        </a>
      </ul>
    </div>
  </nav>

  <div><img style="width: 100%; margin-top:-24%;" src="../images/pexels-maria-geller-2127039.jpg" alt=""></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php
// echo"welcome </br>";
// session_start();
//  echo "welcome " . " " .$_SESSION["FULLNAME"]  ;
//  echo "<form method='post'> <button type='submit' name='logout'> LOGOUT </button> </form>";
if (isset($_POST["logout"])) {
  session_unset();
  session_destroy();
  header("location: login.php");
}
?>