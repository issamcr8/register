<?php
$message = '';
$error = '';
$error_signup ='';
//  <!-- sign in -->

if (isset($_POST["login"])) {

    // error $_POST["Password"] undefined //
    $_POST["Password"] = '';
    $ps = $_POST["Password"];

    

    $MyData = file_get_contents('dataemp.json');
    $array_data = json_decode($MyData);


    $_SESSION["LOGIN"] = false;
    $ps = $_POST["Password"];
    foreach ($array_data as $key) {
if ($key->Fullname === $_POST["Fullname"] && password_verify($_POST["password"], $key->Password)) {

            header("location: index.php ");
            session_start();
            $_SESSION["FULLNAME"] = $_POST["Fullname"];
            $_SESSION["PASSWORD"] = $_POST["password"];
            $_SESSION["LOGIN"] = true;
        } 
        // else {
        //     $_SESSION["LOGIN"] === false;
        // }
    }
    if ($_SESSION["LOGIN"] === false) {
        $error = "<p class='text-danger'>error account not find </p> </br>";
    }
    if (empty($_POST["Fullname"]) || empty($_POST["password"])) {
        $error = "<p class='text-danger'> enter fullname/password </p> </br>";
    }
}

//   <!-- sign up --> <!-- sign up --> <!-- sign up --> <!-- sign up --> <!-- sign up --> <!-- sign up -->




if (isset($_POST["signup"])) {
    $ps = $_POST["Password"];
    $password_hash = password_hash($ps, PASSWORD_DEFAULT);
    if (empty($_POST["Fullname"])) {
        $error_signup = "<label  class='text-danger' >Enter Fullname </label>";
    } else if (empty($_POST["D_License"])) {
        $error_signup = "<label class='text-danger'>Enter number Driver License </label>";
    } else if (empty($_POST["Email"])) {
        $error_signup = "<label class='text-danger'>Enter Email</label>";
    } else if (empty($password_hash)) {
        $error_signup = "<label class='text-danger'>Enter Password</label>";
    } else {
        if (file_exists('dataemp.json')) {
            $datajson = file_get_contents('dataemp.json');
            $array_data = json_decode($datajson, true);
            $extra = array(
                'Fullname'      =>     $_POST['Fullname'],
                'D_License'     =>     $_POST["D_License"],
                'Email'         =>     $_POST["Email"],
                'Password'      =>     $password_hash
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('dataemp.json', $final_data)) {
                $message = "<label class='text-success'>Account created</label>";
            }
        } else {
            $error_signup = 'JSON File not exist';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title>Login and Registration Form with HTML5 and CSS3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login and Registration" />
    <meta name="author" content="issam & salsabil" />
    <link rel="shortcut icon" href="../css/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/style3.css" />
    <link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header>
            <h1 style="color:black;">Login and Registration Form <span style="color:#EF711D;">CAR</span></h1>
        </header>
        <section>
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form method="post">

                            <!-- LOG IN --> <!-- LOG IN --> <!-- LOG IN --> <!-- LOG IN --> 

                            <h1 style="color:black;">Log in</h1>
                            <p>
                                <label for="Fullname" data-icon="u"> Fullname </label>
                                <input name="Fullname" type="text" placeholder="Fullname" />
                            </p>
                            <p>
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input name="password" type="password" placeholder="eg. X8df!90EO" />
                            </p>
                            <?php
                            if (isset($error)) {
                                echo $error;
                            }
                            ?>
                            <p class="login button">
                                <input style="background-color: #EF711D; color:#fff;" type="submit" name="login" value="Login" />
                            </p>
                            
                            <p class="change_link">
                                Not a member yet ?
                                <a style =" color:black;" href="#toregister" class="to_register">Join us</a>
                            </p>
                        </form>
                    </div>
                    <div id="register" class="animate form">

                        <!-- SIGN UP --><!-- SIGN UP --><!-- SIGN UP --><!-- SIGN UP --><!-- SIGN UP -->
                        <form method="post">
                            <h1> Sign up </h1>
                            <?php
                            if (isset($error_signup)) {
                                echo $error_signup;
                            }
                            ?>
                            <p>
                                <label for="Fullname"  data-icon="u">Fullname</label>
                                <input name="Fullname" type="text" placeholder="Fullname" />
                            </p>
                            <p>
                                <label for="D_License"  data-icon="e"> driver license</label>
                                <input  name="D_License"  type="text" placeholder="driver license"/>
                            </p>
                            <p>
                                <label style="color:black;" for="Email"  data-icon="p">Email</label>
                                <input name="Email" type="email" placeholder="Email" />
                            </p>
                            <p>
                                <label for="Password" data-icon="p"> password </label>
                                <input type="password" name="Password" placeholder="eg. X8df!90EO" />
                            </p>
                            <p >
                                <input style="background-color:#EF711D; color:#fff;"type="submit" name="signup" value="signup"  />
                            </p>
                            <?php
                             if (isset($message)) {
                             echo $message;
                            }
                            ?>
                            <p class="change_link">
                                Already a member ?
                                <a style="color:black;" href="#tologin" class="to_register"> Go and log in </a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
</body>
</html>